<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use XMLReader;
use SimpleXMLElement;
use App\Data_feed_config;
use App\Category_config;

class FeedConfigController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    protected function csvFeed($feed_url, $delimiter=',') 
    {
        if (($handle = fopen($feed_url, "r")) !== FALSE) {
            // $data = fgetcsv($handle, 0, ";");
            $keyAry = array();
            $mapingAry = array();
            $examStr = array();

            $num = 0;
            while (($data = fgetcsv($handle, 0, $delimiter)) !== FALSE && $num <= 1) {
                for ($c = 0; $c < count($data); $c++) {
                    if ($num == 0) {
                        $value = explode(' ', $data[$c]);
                        $value = implode('_', $value);
                        $keyAry[$c] = $value;
                    } else {
                        $mapingAry[$keyAry[$c]] = $keyAry[$c];
                        $examStr[$keyAry[$c]] = $data[$c];
                    }
                }
                $num++;
            }
            fclose($handle);
        }
        return array('mapingAry' => $mapingAry, 'examStr' => $examStr);
    }

    protected function xmlFeed($feed_url) 
    {
        $url = $feed_url; //variations

        $xml = new XMLReader();
        $xml->open($url);

        while ($xml->read() && $xml->name != 'product') {;
        }

        $ele = new SimpleXMLElement($xml->readOuterXML());

        $mapingAry = array();
        $examStr = array();

        $mapingAry['product_id'] = 'product_id';
        $examStr['product_id'] = strval($ele->attributes());

        $mapingAry['name'] = 'name';
        $examStr['name'] = strval($ele->name);

        $mapingAry['price'] = 'price';
        $examStr['price'] = strval($ele->price);

        $mapingAry['URL'] = 'URL';
        $examStr['URL'] = strval($ele->URL);
        $num = 1;
        foreach ($ele->images->image as $key => $value) {
            $arykey = 'image_' . $num;
            $mapingAry[$arykey] = 'image_' . $num;
            $examStr['image_' . $num] = strval($value);
            $num++;
        }
        
        $mapingAry['description'] = 'description';
        $examStr['description'] = strval($ele->description);

        $mapingAry['category'] = 'category';
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
                $propVal = implode(',', json_decode((json_encode($value->value)), true));
                $mapingAry[$propName] = $propName;
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
                    $mapingAry[$propName] = $propName;
                    $examStr[$propName] = $propVal;
                }
            }
        }

        $xml->close();
        return array('mapingAry' => $mapingAry, 'examStr' => $examStr);
    }

    public function getExamFeed(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merchant_name' => 'required',
            'feed_url' => 'active_url',
            'update_freq' => 'required',
            'parser_cls' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(array('state' => 'in_valid', 'res' => $validator->errors()));
        }
        $merchantName = $request->input('merchant_name');
        $feed_url = $request->input('feed_url');
        $update_freq = $request->input('update_freq');
        $parser_cls = $request->input('parser_cls');
        $active_state = $request->input('active_state');

        if ($parser_cls == 'xml')
            $res = $this->xmlFeed($feed_url);
        else if ($parser_cls == 'csv_auto')
            $res = $this->csvFeed($feed_url);
        else if ($parser_cls == 'csv_semi')
            $res = $this->csvFeed($feed_url, ';');
        else if ($parser_cls == 'csv_tab')
            $res = $this->csvFeed($feed_url, ' ');
        else if ($parser_cls == 'csv_logic')
            $res = $this->csvFeed($feed_url, '|');

        return response()->json(array('state'=>'success', 'res'=>$res));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedList = Data_feed_config::orderBy('id', 'desc')->get();

        return view('feedConfig.list', ['actFlag' => 'feedList', 'feedList'=>$feedList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryList = Category_config::all();
        $categoryConfigIdAry = array();
        foreach ($categoryList as $key => $category) {
            $categoryConfigIdAry[$key]['id'] = $category->id;
            $categoryConfigIdAry[$key]['text'] = $category->category_name;
        }
        return view('feedConfig.create', ['actFlag' => 'feedConf', 'categoryConfigIdList'=> $categoryConfigIdAry]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merchant_name' => 'required',
            'feed_url' => 'active_url',
            'interval_hours' => 'required',
            'parser_cls' => 'required',
            'category_alias'=>'required',
            'category_config_id' => 'required',
            'title'=>'required',
            'price'=> 'required',
            'buy_link'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('state' => 'in_valid', 'res' => $validator->errors()));
        }
        $res = Data_feed_config::create(request([
            'merchant_name',
            'interval_hours',
            'feed_url',
            'parser_cls',
            'min_price',
            'active_state',
            'category_config_id',
            'category_alias',
            'title',
            'price',
            'buy_link',
            'image',
            'descript',
            'travel_type',
            'duration',
            'country',
            'region',
            'city',
            'stars',
            'rating',
            'service_type',
            'allinclusive',
            'departure_date',
            'num_person',
            'num_offer',
            'latitude',
            'longitude',
            'option1',
            'option2',
            'option3',
            'option4',
            'option5'
        ]));
        
        return response()->json(array('state' => 'success', 'res'=> $res));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feed = Data_feed_config::findOrFail($id);
        $categoryList = Category_config::all();
        $categoryConfigIdAry = array();
        foreach ($categoryList as $key => $category) {
            $categoryConfigIdAry[$key]['id'] = $category->id;
            $categoryConfigIdAry[$key]['text'] = $category->category_name;
        }
        return view('feedConfig.create', ['actFlag' => 'feedConf', 'feed'=> $feed, 'categoryConfigIdList' => $categoryConfigIdAry]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'merchant_name' => 'required',
            'feed_url' => 'active_url',
            'interval_hours' => 'required',
            'parser_cls' => 'required',
            'category_alias' => 'required',
            'category_config_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'buy_link' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('state' => 'in_valid', 'res' => $validator->errors()));
        }

        $dataFeedObj = Data_feed_config::findOrFail($id);
        $dataFeedObj->merchant_name = $request->merchant_name;
        $dataFeedObj->interval_hours = $request->interval_hours;
        $dataFeedObj->feed_url = $request->feed_url;
        $dataFeedObj->parser_cls = $request->parser_cls;
        $dataFeedObj->min_price = $request->min_price;
        $dataFeedObj->active_state = $request->active_state;
        $dataFeedObj->category_config_id = $request->category_config_id;
        $dataFeedObj->category_alias = $request->category_alias;
        $dataFeedObj->title = $request->title;
        $dataFeedObj->price = $request->price;
        $dataFeedObj->buy_link = $request->buy_link;
        $dataFeedObj->image = $request->image;
        $dataFeedObj->descript = $request->descript;
        $dataFeedObj->travel_type = $request->travel_type;
        $dataFeedObj->duration = $request->duration;
        $dataFeedObj->country = $request->country;
        $dataFeedObj->region = $request->region;
        $dataFeedObj->city = $request->city;
        $dataFeedObj->stars = $request->stars;
        $dataFeedObj->rating = $request->rating;
        $dataFeedObj->service_type = $request->service_type;
        $dataFeedObj->allinclusive = $request->allinclusive;
        $dataFeedObj->departure_date = $request->departure_date;
        $dataFeedObj->num_person = $request->num_person;
        $dataFeedObj->num_offer = $request->num_offer;
        $dataFeedObj->latitude = $request->latitude;
        $dataFeedObj->longitude = $request->longitude;
        $dataFeedObj->option1 = $request->option1;
        $dataFeedObj->option2 = $request->option2;
        $dataFeedObj->option3 = $request->option3;
        $dataFeedObj->option4 = $request->option4;
        $dataFeedObj->option5 = $request->option;

        $dataFeedObj->save();

        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Data_feed_config::destroy($id);
    }
}
