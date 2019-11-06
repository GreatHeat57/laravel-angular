<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use XMLReader;
use SimpleXMLElement;
use App\Data_feed_config;
use App\Import_feed;
use Exception;
use Illuminate\Support\Facades\DB;

ini_set('memory_limit', '300M');
ini_set('max_execution_time', '6000');

class ImportFeedController extends Controller
{
    protected $feedRowinDB = null;
    protected $importDataByFeed;

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feedList = Data_feed_config::orderBy('id', 'desc')->get();
        return view('importFeeds.import', ['actFlag' => 'importfeed', 'feedList' => $feedList]);
    }

    protected function csvFeedtoAry($feed_url, $delimiter = ',')
    {
        if (($handle = fopen($feed_url, "r")) !== FALSE) {
            // $data = fgetcsv($handle, 0, ";");
            $keyAry = array();
            $examStr = array();

            $num = 0;
            while (($data = fgetcsv($handle, 0, $delimiter)) !== FALSE) {
                for ($c = 0; $c < count($data); $c++) {
                    if ($num == 0) {
                        $value = explode(' ', $data[$c]);
                        $value = implode('_', $value);
                        $keyAry[$c] = $value;
                    } else {
                        $examStr[$keyAry[$c]] = $data[$c];
                    }
                }
                $num++;

                
            }
            fclose($handle);
        }
        return $examStr;
    }

    protected function csvFeed($feedUrl, $delimiter)
    {
        $feedAry = $this->csvFeedtoAry($feedUrl, $delimiter);

        return 'success';
    }

    protected function xmlFeedtoArray($xml)
    {
        $ele = new SimpleXMLElement($xml->readOuterXML());

        $examStr = array();

        $examStr['product_id'] = strval($ele->attributes());

        $examStr['name'] = strval($ele->name);

        $examStr['price'] = strval($ele->price);

        $examStr['URL'] = strval($ele->URL);
        $num = 1;
        foreach ($ele->images->image as $key => $value) {
            $examStr['image_' . $num] = strval($value);
            $num++;
        }

        $examStr['description'] = strval($ele->description);

        if (count($ele->categories->children()) > 0) {
            $categoryStr = "";
            foreach ($ele->categories->category as $key => $value) {
                $categoryStr .= strval($ele->categories->category->attributes());
            }
            $examStr['category'] =  $categoryStr;
        } else {
            $examStr['category'] = "";
        }

        //properties
        if (count($ele->properties->children()) > 0) {
            $propNameAry = array();
            $propNameNo = 1;
            foreach ($ele->properties->property as $key => $value) {
                $propName = strval($value->attributes());
                if (in_array($propName, $propNameAry)) {
                    $propName .= "_" . $propNameNo;
                    $propNameNo++;
                } else {
                    $propName = strval($value->attributes());
                    array_push($propNameAry, $propName);
                }
                try {
                    $propVal = implode(',', (array)$value->value);
                } catch (Exception $var) {
                    $propVal = "";
                }
                $examStr[$propName] = $propVal;
            }
        }

        //variations
        if (count($ele->variations->children()) > 0) {
            $propNameAry = array();
            $propNameNo = 1;
            foreach ($ele->variations->variation as $key => $variation) {
                $loopFlag = false;
                foreach ($variation->property as $key => $value) {
                    $propName = strval($value->attributes());
                    if (in_array($propName, $propNameAry)) {
                        $propName .= "_" . $propNameNo;
                        if (!$loopFlag) {
                            $propNameNo++;
                            $loopFlag = true;
                        }
                    } else {
                        $propName = strval($value->attributes());
                        array_push($propNameAry, $propName);
                    }
                    $propVal = implode(',', json_decode((json_encode($value->value)), true));
                    $examStr[$propName] = $propVal;
                }
            }
        }

        unset($ele);

        return $examStr;
    }

    protected function xmlFeedImport($feedUrl)
    {
        $url = $feedUrl; //variations

        $xml = new XMLReader();
        $xml->open($url);

        while ($xml->read() && $xml->name != 'product') {;
        }

        $k = 0;
        $importAry = array();
        while ($xml->name == 'product') {
            $feedAry = $this->xmlFeedtoArray($xml);

            //make insert array
            $insertTmp = $this->toAryForInsert($feedAry);
            if ($insertTmp['state']) {
                $importAry[] = $insertTmp['value'];
                $k ++;
            }
            // break;
            $xml->next('product');
        }
        $xml->close();

        $insertData = collect($importAry);
        foreach($insertData->chunk(500) as $key => $chunk) {
            DB::table('import_feed')->insert($chunk->toArray());
        }
        return $k;
    }

    protected function toAryForInsert($dataAry) {
        $feedRow = $this->feedRowinDB;

        if (in_array($dataAry['product_id'], $this->importDataByFeed)) return array('value'=>'', 'state'=>false);

        $importFeed = array();
        $importFeed['data_feed_config_id'] = $feedRow->id;
        $importFeed['category_config_id'] = $feedRow->category_config_id;
        $importFeed['product_id'] =$dataAry['product_id'];
        $importFeed['title'] = ($feedRow->title != "") ? ( (isset($dataAry[$feedRow->title])) ? $dataAry[$feedRow->title]: "" ) : "";
        $importFeed['price'] = ($feedRow->price != "") ? ( (isset($dataAry[$feedRow->price])) ? $dataAry[$feedRow->price]: "") : "";
        $importFeed['buy_link'] = ($feedRow->buy_link != "") ? ( (isset($dataAry[$feedRow->buy_link])) ? $dataAry[$feedRow->buy_link]: "") : "";
        
        $imgKeys = explode("|", $feedRow->image);
        $imgUrls = array();
        foreach($imgKeys as $key=>$value) {
            if (isset($dataAry[$value])) {
                array_push($imgUrls, $dataAry[$value]);
            }
        }
        $imgUrls = implode("|", $imgUrls);
        $importFeed['image'] = $imgUrls;

        $importFeed['descript'] = ($feedRow->descript != "") ? ( (isset($dataAry[$feedRow->descript])) ? $dataAry[$feedRow->descript]: "") : "";
        $importFeed['travel_type'] = ($feedRow->travel_type != "") ? ( (isset($dataAry[$feedRow->travel_type])) ? $dataAry[$feedRow->travel_type]: "") : "";
        $importFeed['duration'] = ($feedRow->duration != "") ? ( (isset($dataAry[$feedRow->duration])) ? $dataAry[$feedRow->duration]: "") : "";
        $importFeed['country'] = ($feedRow->country != "") ? ( (isset($dataAry[$feedRow->country])) ? $dataAry[$feedRow->country]: "") : "";
        $importFeed['region'] = ($feedRow->region != "") ? ( (isset($dataAry[$feedRow->region])) ? $dataAry[$feedRow->region]: "") : "";
        $importFeed['city'] = ($feedRow->city != "") ? ( (isset($dataAry[$feedRow->city])) ? $dataAry[$feedRow->city]: "") : "";
        $importFeed['stars'] = ($feedRow->stars != "") ? ( (isset($dataAry[$feedRow->stars])) ? $dataAry[$feedRow->stars]: "") : "";
        $importFeed['rating'] = ($feedRow->rating != "") ? ( (isset($dataAry[$feedRow->rating])) ? $dataAry[$feedRow->rating]: "") : "";
        $importFeed['service_type'] = ($feedRow->service_type != "") ? ( (isset($dataAry[$feedRow->service_type])) ? $dataAry[$feedRow->service_type]: "") : "";
        $importFeed['allinclusive'] = ($feedRow->allinclusive != "") ? ( (isset($dataAry[$feedRow->allinclusive])) ? $dataAry[$feedRow->allinclusive]: "") : "";
        $importFeed['departure_date'] = ($feedRow->departure_date != "") ? ( (isset($dataAry[$feedRow->departure_date])) ? $dataAry[$feedRow->departure_date]: "") : "";
        $importFeed['num_person'] = ($feedRow->num_person != "") ? ( (isset($dataAry[$feedRow->num_person])) ? $dataAry[$feedRow->num_person]: "") : "";
        $importFeed['num_offer'] = ($feedRow->num_offer != "") ? ( (isset($dataAry[$feedRow->num_offer])) ? $dataAry[$feedRow->num_offer]: "") : "";
        $importFeed['latitude'] = ($feedRow->latitude != "") ? ( (isset($dataAry[$feedRow->latitude])) ? $dataAry[$feedRow->latitude]: "") : "";
        $importFeed['longitude'] = ($feedRow->longitude != "") ? ( (isset($dataAry[$feedRow->longitude])) ? $dataAry[$feedRow->longitude]: "") : "";
        $importFeed['option1'] = ($feedRow->option1 != "") ? ( (isset($dataAry[$feedRow->option1])) ? $dataAry[$feedRow->option1]: "") : "";
        $importFeed['option2'] = ($feedRow->option2 != "") ? ( (isset($dataAry[$feedRow->option2])) ? $dataAry[$feedRow->option2]: "") : "";
        $importFeed['option3'] = ($feedRow->option3 != "") ? ( (isset($dataAry[$feedRow->option3])) ? $dataAry[$feedRow->option3]: "") : "";
        $importFeed['option4'] = ($feedRow->option4 != "") ? ( (isset($dataAry[$feedRow->option4])) ? $dataAry[$feedRow->option4]: "") : "";
        $importFeed['option5'] = ($feedRow->option5 != "") ? ( (isset($dataAry[$feedRow->option5])) ? $dataAry[$feedRow->option5]: "") : "";

        return array('value'=>$importFeed, 'state'=>true);

    }

    public function importingFeed(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array('state' => 'in_valid', 'res' => $validator->errors()));
        }
        $id = $request->input('id');

        $feed = Data_feed_config::findOrFail($id);
        $this->feedRowinDB = $feed;

        $parserCls = $feed->parser_cls;
        $feedUrl = $feed->feed_url;
        $activeState = $feed->active_state;
        $feedConfigId = $feed->id;

        if ($activeState == 0) return response()->json(array('state' => 'success', 'res' => 'deactive'));

        $tmp = DB::table('import_feed')->select('product_id')->where('data_feed_config_id', $feedConfigId)->get();
        $tmp2 = [];
        foreach($tmp as $key=>$value) {
            $tmp2[] = $value->product_id;
        }
        $this->importDataByFeed = $tmp2;

        if ($parserCls == 'xml')
            $res = $this->xmlFeedImport($feedUrl);
        else if ($parserCls == 'csv_auto')
            $res = $this->csvFeed($feedUrl, ',');
        else if ($parserCls == 'csv_semi')
            $res = $this->csvFeed($feedUrl, ';');
        else if ($parserCls == 'csv_tab')
            $res = $this->csvFeed($feedUrl, ' ');
        else if ($parserCls == 'csv_logic')
            $res = $this->csvFeed($feedUrl, '|');

        return response()->json(array('state' => 'success', 'res' => $res));
    }
}
