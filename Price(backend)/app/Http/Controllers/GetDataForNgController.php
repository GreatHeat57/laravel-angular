<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Category_config;
use App\Import_feed;
use Illuminate\Support\Facades\DB;

class GetDataForNgController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'verified', 'admin']);
    }

    public function getCategoryNames()
    {
        $CategoryList = Category_config::orderBy('id', 'asc')->get();
        $infoAry = array();
        foreach ($CategoryList as $key => $value) {
            $infoAry[$key]['id'] = $value->id;
            $infoAry[$key]['name'] = $value->category_name;
        }

        return response()->json(array('data' => $infoAry));
    }

    public function getSearchItembyId(Request $request)
    {
        $id = $request->input('id');
        $category = Category_config::findOrFail($id);
        $category->show_array = explode(",", $category->show_array);
        
        $id = $category->id;
        $tmp = array();
        $category = $category->toArray();
        
        $itemValAry = array(); $key = 0;
        for ($i = 0; $i < 10; $i ++) { 
            if ($category['search_text_' . $i] != '' && $category['search_field_' . $i] != '') {
                if ($category['search_field_' . $i] == 'country' || $category['search_field_' . $i] == 'region' || $category['search_field_' . $i] == 'city'
                 || $category['search_field_' . $i] == 'service_type' || $category['search_field_' . $i] == 'allinclusive'
                 || $category['search_field_' . $i] == 'option1' || $category['search_field_' . $i] == 'option2' || $category['search_field_' . $i] == 'option3' || $category['search_field_' . $i] == 'option4' || $category['search_field_' . $i] == 'option5') 
                {
                    $itemValAry[$key]['value'] = DB::table('import_feed')
                        ->select($category['search_field_' . $i])
                        ->where('category_config_id', $category['id'])
                        ->groupBy($category['search_field_' . $i])
                        ->get();
                    $itemValAry[$key]['text'] = $category['search_text_' . $i];
                    $itemValAry[$key]['field_name'] = $category['search_field_' . $i];
                } else {
                    $itemValAry[$key]['value'] = $category['search_field_' . $i];
                    $itemValAry[$key]['text'] = $category['search_text_' . $i];
                    $itemValAry[$key]['field_name'] = $category['search_field_' . $i];
                }
                $key ++;
            }
        }

        return response()->json(array('data' => array('items'=>$itemValAry, 'show_array'=> $category['show_array'])));
    }

    public function getLocationItembyLocations(Request $request)
    {
        $categoryId = $request->input('id');
        $locationName = $request->input('location_name');
        $locationValue = $request->input('location_value');
        $res = array();
        if ($locationName == 'country') {
            $itemValAry = DB::table('import_feed')->select('region')
                ->where('category_config_id', $categoryId)->where($locationName, $locationValue)
                ->groupBy('region')->get();
            $res['region'] =  $itemValAry;
            $itemValAry = DB::table('import_feed')->select('city')
                ->where('category_config_id', $categoryId)->where($locationName, $locationValue)
                ->groupBy('city')->get();
            $res['city'] =  $itemValAry;
        } else if ($locationName == 'region') {
            $itemValAry = DB::table('import_feed')->select('city')
                    ->where('category_config_id', $categoryId)->where($locationName, $locationValue)
                    ->groupBy('city')->get();
            $res['city'] =  $itemValAry;
        } else {
            return response()->json(array('data' => false));
        }

        if ($locationValue == '') {
            return response()->json(array('data' => false));
        }

        return response()->json(array('data' => $res));
    }

    public function getServiceData(Request $request)
    {
        $categoryId = $request->input('category_id');
        $searchData = $request->input('search_data');
        $pageNum = $request->input('page_num');
        $dataCount = $request->input('data_count');
        $sortPrice = $request->input('price_sort');

        $recordsObj = DB::table('import_feed')
            ->where('category_config_id', $categoryId)
            ->offset($pageNum)
            ->limit($dataCount)
            // ->orderBy('id', 'desc')
            ->groupBy('title');

        if (is_array($searchData)) {

            foreach ($searchData as $key => $value) {
                if ($key == 'title' || $key == 'travel_type') {
                    $recordsObj->where($key, 'like', $value . '%');
                } else if ($key == 'price' || $key == 'duration' || $key == 'num_person' || $key == 'num_offer' || $key == 'latitude' || $key == 'longitude') {
                    $recordsObj->whereBetween($key, [$value['min'], $value['max']]);
                } else {
                    $recordsObj->where($key, $value);
                }
            }
        }

        if ($sortPrice == 'false')
            $recordsObj->orderBy('price', 'asc');
        else if ($sortPrice == 'true')
            $recordsObj->orderBy('price', 'desc');
        else
            $recordsObj->orderBy('id', 'desc');

        $res = $recordsObj->get();

        $recordsNums = DB::table('import_feed')
            ->where('category_config_id', $categoryId)->orderBy('id', 'desc')
            ->groupBy('title');

        if (is_array($searchData)) {

            foreach ($searchData as $key => $value) {
                if ($key == 'title' || $key == 'travel_type') {
                    $recordsNums->where($key, 'like', $value . '%');
                } else if ($key == 'price' || $key == 'duration' || $key == 'num_person' || $key == 'num_offer' || $key == 'latitude' || $key == 'longitude') {
                    $recordsNums->whereBetween($key, [$value['min'], $value['max']]);
                } else {
                    $recordsNums->where($key, $value);
                }
            }
        }
        $res2 = $recordsNums->get();

        return response()->json(array('data' => array('data' => $res, 'dataNum' => ceil(count($res2) / 10))));
    }

    public function getDetailData(Request $request)
    {
        $id = $request->input('id');

        $feedDetail = Import_feed::findOrFail($id);
        $categoryId = $feedDetail->category_config_id;
        $showDetail = Category_config::findOrFail($categoryId);

        $showAry = explode(",", $showDetail->show_array);

        return response()->json(array('data'=>array('data'=>$feedDetail, 'show_array'=> $showAry)));
    }
}
