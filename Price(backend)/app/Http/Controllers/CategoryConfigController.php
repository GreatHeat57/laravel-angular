<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Category_config;

class CategoryConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = $this->getCategoryList();

        return view('categoryConfig.list', ['actFlag' => 'categoryList', 'categoryList'=>$categoryList]);
    }

    protected function getCategoryList()
    {
        $CategoryList = Category_config::orderBy('id', 'desc')->get();
        $showArrayTextAry = [
            'Title',
            'Price',
            'Image',
            'Description',
            'Travel Type',
            'Duration',
            'Country',
            'Region',
            'City',
            'Stars',
            'Rating',
            'Servie Type',
            'Allinclusive',
            'Departure Date',
            'Number of Person',
            'Number of Offer',
            'Latitude',
            'Longitude',
            'Option1',
            'Option1',
            'Option2',
            'Option3',
            'Option4',
            'Option5'
        ];
        $searchFieldAry = [
            'title' => 'title',
            'price' => 'price',
            'descript' => 'descript',
            'travel_type' => 'travel type',
            'duration' => 'duration',
            'country' => 'country',
            'region' => 'region',
            'city' => 'city',
            'stars' => 'stars',
            'rating' => 'rating',
            'service_type' => 'service type',
            'allinclusive' => 'allinclusive',
            'departure_date' => 'departure date',
            'num_person' => 'number of person',
            'num_offer' => 'number of offer',
            'latitude' => 'latitude',
            'longitude' => 'longitude',
            'option1' => 'option1',
            'option2' => 'option2',
            'option3' => 'option3',
            'option4' => 'option4',
            'option5' => 'option5'
        ];
        $resData = array();
        foreach ($CategoryList as $key => $value) {
            $searchItem = "";
            $resData[$key][0] = $key + 1;
            $resData[$key][1] = $value->category_name;

            $searchText0 = $value->search_text_0;
            $searchField0 = $value->search_field_0;
            if (($searchText0 != null || $searchText0 != "") && ($searchField0 != null || $searchField0 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText0 . ": " . $searchField0;
            }

            $searchText1 = $value->search_text_1;
            $searchField1 = $value->search_field_1;
            if (($searchText1 != null || $searchText1 != "") && ($searchField1 != null || $searchField1 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText1 . ": " . $searchField1;
            }

            $searchText2 = $value->search_text_2;
            $searchField2 = $value->search_field_2;
            if (($searchText2 != null || $searchText2 != "") && ($searchField2 != null || $searchField2 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText2 . ": " . $searchField2;
            }

            $searchText3 = $value->search_text_3;
            $searchField3 = $value->search_field_3;
            if (($searchText3 != null || $searchText3 != "") && ($searchField3 != null || $searchField3 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText3 . ": " . $searchField3;
            }

            $searchText4 = $value->search_text_4;
            $searchField4 = $value->search_field_4;
            if (($searchText4 != null || $searchText4 != "") && ($searchField4 != null || $searchField4 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText4 . ": " . $searchField4;
            }

            $searchText5 = $value->search_text_5;
            $searchField5 = $value->search_field_5;
            if (($searchText5 != null || $searchText5 != "") && ($searchField5 != null || $searchField5 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText5 . ": " . $searchField5;
            }

            $searchText6 = $value->search_text_6;
            $searchField6 = $value->search_field_6;
            if (($searchText6 != null || $searchText6 != "") && ($searchField6 != null || $searchField6 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText6 . ": " . $searchField6;
            }

            $searchText7 = $value->search_text_7;
            $searchField7 = $value->search_field_7;
            if (($searchText7 != null || $searchText7 != "") && ($searchField7 != null || $searchField7 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText7 . ": " . $searchField7;
            }

            $searchText8 = $value->search_text_8;
            $searchField8 = $value->search_field_8;
            if (($searchText8 != null || $searchText8 != "") && ($searchField8 != null || $searchField8 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText8 . ": " . $searchField8;
            }

            $searchText9 = $value->search_text_9;
            $searchField9 = $value->search_field_9;
            if (($searchText9 != null || $searchText9 != "") && ($searchField9 != null || $searchField9 != "")) {
                if ($searchItem != "") $searchItem .= ", ";
                $searchItem .= $searchText9 . ": " . $searchField9;
            }

            $resData[$key][2] = $searchItem;

            $showArray = $value->show_array;
            $showArray = explode(',', $showArray);
            $showItems = "";
            foreach($showArray as $k => $val) {
                if ($val) {
                    if ($showItems != "") $showItems .= ", ";
                    $showItems .= $showArrayTextAry[$k];
                }
            }

            $resData[$key][3] = $showItems;

            $resData[$key][4] = $value->id;
        }
        return $resData;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryConfig.create', ['actFlag' => 'categoryConf']);
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
            'category_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('state' => 'in_valid', 'res' => $validator->errors()));
        }

        $res = Category_config::create(request([
                'category_name',
                'search_text_0',
                'search_field_0',
                'search_text_1',
                'search_field_1',
                'search_text_2',
                'search_field_2',
                'search_text_3',
                'search_field_3',
                'search_text_4',
                'search_field_4',
                'search_text_5',
                'search_field_5',
                'search_text_6',
                'search_field_6',
                'search_text_7',
                'search_field_7',
                'search_text_8',
                'search_field_8',
                'search_text_9',
                'search_field_9',
                'show_array'
        ]));
        return response()->json(array('state' => 'success', 'res' => $res));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category_config::findOrFail($id);
        $category->show_array = explode(",", $category->show_array);
        // dd($category->show_array);
        return view('categoryConfig.create', ['actFlag' => 'categoryConf', 'category' => $category]);
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
            'category_name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(array('state' => 'in_valid', 'res' => $validator->errors()));
        }

        $dataCategory = Category_config::findOrFail($id);
        $dataCategory->category_name = $request->category_name;
        $dataCategory->search_text_0 = $request->search_text_0;
        $dataCategory->search_field_0 = $request->search_field_0;
        $dataCategory->search_text_1 = $request->search_text_1;
        $dataCategory->search_field_1 = $request->search_field_1;
        $dataCategory->search_text_2 = $request->search_text_2;
        $dataCategory->search_field_2 = $request->search_field_2;
        $dataCategory->search_text_3 = $request->search_text_3;
        $dataCategory->search_field_3 = $request->search_field_3;
        $dataCategory->search_text_4 = $request->search_text_4;
        $dataCategory->search_field_4 = $request->search_field_4;
        $dataCategory->search_text_5 = $request->search_text_5;
        $dataCategory->search_field_5 = $request->search_field_5;
        $dataCategory->search_text_6 = $request->search_text_6;
        $dataCategory->search_field_6 = $request->search_field_6;
        $dataCategory->search_text_7 = $request->search_text_7;
        $dataCategory->search_field_7 = $request->search_field_7;
        $dataCategory->search_text_8 = $request->search_text_8;
        $dataCategory->search_field_8 = $request->search_field_8;
        $dataCategory->search_text_9 = $request->search_text_9;
        $dataCategory->search_field_9 = $request->search_field_9;
        $dataCategory->show_array = $request->show_array;

        $dataCategory->save();

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
        return Category_config::destroy($id);
    }
}
