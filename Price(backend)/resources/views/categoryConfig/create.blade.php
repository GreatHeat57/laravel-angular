@extends('layouts.ly-home') @section('navItems')
<li class="nav-item d-none d-sm-inline-block">
    <h1 class="m-0 text-dark">Category Configration</h1>
</li>
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{url('/home')}}" class="nav-link">Admin</a>
</li>

<li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Category Configration</a>
</li>
@endsection @section('content')
<div class="row">
    <div class="col-6">
        <!-- database mapping -->
        <div class="card card-danger" id="search-config">
            <div class="card-header">
                <h3 class="card-title">Search Configration</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-3 control-label" for="category_name">Category Name</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" required id="category_name" name="category_name"
                                placeholder="Enter category name" value="@if (isset($category)){{$category->category_name}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_0">Search 1 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_0" name="search_text_0" placeholder="Enter label of search 1"
                                value="@if (isset($category)){{$category->search_text_0}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_0">Search 1 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_0" selected-val="@if(isset($category)){{$category->search_field_0}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_1">Search 2 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_1" name="search_text_1" placeholder="Enter label of search 2"
                                value="@if(isset($category)){{$category->search_text_1}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_1">Search 2 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_1" selected-val="@if(isset($category)){{$category->search_field_1}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_2">Search 3 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_2" name="search_text_2" placeholder="Enter label of search 3"
                                value="@if (isset($category)){{$category->search_text_2}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_2">Search 3 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_2" selected-val="@if (isset($category)){{$category->search_field_2}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_3">Search 4 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_3" name="search_text_3" placeholder="Enter label of search 4"
                                value="@if (isset($category)){{$category->search_text_3}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_3">Search 4 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_3" selected-val="@if (isset($category)){{$category->search_field_3}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_4">Search 5 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_4" name="search_text_4" placeholder="Enter label of search 5"
                                value="@if (isset($category)){{$category->search_text_4}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_4">Search 5 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_4">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_5">Search 6 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_5" name="search_text_5" placeholder="Enter label of search 6"
                                value="@if (isset($category)){{$category->search_text_5}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_5">Search 6 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_5">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_6">Search 7 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_6" name="search_text_6" placeholder="Enter label of search 7"
                                value="@if (isset($category)){{$category->search_text_6}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_6">Search 7 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_6">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_7">Search 8 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_7" name="search_text_7" placeholder="Enter label of search 8"
                                value="@if (isset($category)){{$category->search_text_7}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_7">Search 8 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_7">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_8">Search 9 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_8" name="search_text_8" placeholder="Enter label of search 9"
                                value="@if (isset($category)){{$category->search_text_8}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_8">Search 9 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_8">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_text_9">Search 10 Label</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="search_text_9" name="search_text_9" placeholder="Enter label of search 10"
                                value="@if (isset($category)){{$category->search_text_9}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="search_field_9">Search 10 Item</label>
                        <div class="col-9">
                            <select class="custom-select" id="search_field_9">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                </form>
                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                @if (isset($category))
                <button type="button" class="btn btn-danger float-right" id="btn-update-category">Update Category</button>
                @else
                <button type="button" class="btn btn-danger float-right" id="btn-save-category">Save Category</button>
                @endif
            </div>
        </div>
    </div>
    <div class="col-6">
        <!-- example item -->
        <div class="card card-primary" id='show-config'>
            <div class="card-header">
                <h3 class="card-title">Show Configration</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="" class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-3 control-label" for="title">Title</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[0] == 1)
                                <input type="checkbox" class="custom-control-input" id="title" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="title">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="title" checked>
                                @endif
                                <label class="custom-control-label" for="title"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="price">Price</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[1] == 1)
                                <input type="checkbox" class="custom-control-input" id="price" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="price">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="price" checked>
                                @endif
                                <label class="custom-control-label" for="price"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="image">Image</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[2] == 1)
                                <input type="checkbox" class="custom-control-input" id="image" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="image">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="image" checked>
                                @endif
                                <label class="custom-control-label" for="image"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="descript">Description</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[3] == 1)
                                <input type="checkbox" class="custom-control-input" id="descript" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="descript">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="descript" checked>
                                @endif
                                <label class="custom-control-label" for="descript"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="travel_type">Travel Type</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[4] == 1)
                                <input type="checkbox" class="custom-control-input" id="travel_type" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="travel_type">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="travel_type">
                                @endif
                                <label class="custom-control-label" for="travel_type"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="duration">Duration</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[5] == 1)
                                <input type="checkbox" class="custom-control-input" id="duration" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="duration">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="duration">
                                @endif
                                <label class="custom-control-label" for="duration"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="country">Country</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[6] == 1)
                                <input type="checkbox" class="custom-control-input" id="country" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="country">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="country" checked>
                                @endif
                                <label class="custom-control-label" for="country"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="region">Region</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[7] == 1)
                                <input type="checkbox" class="custom-control-input" id="region" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="region">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="region" checked>
                                @endif
                                <label class="custom-control-label" for="region"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="city">City</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[8] == 1)
                                <input type="checkbox" class="custom-control-input" id="city" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="city">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="city" checked>
                                @endif
                                <label class="custom-control-label" for="city"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="stars">Stars</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[9] == 1)
                                <input type="checkbox" class="custom-control-input" id="stars" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="stars">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="stars">
                                @endif
                                <label class="custom-control-label" for="stars"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="rating">Rating</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[10] == 1)
                                <input type="checkbox" class="custom-control-input" id="rating" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="rating">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="rating">
                                @endif
                                <label class="custom-control-label" for="rating"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="service_type">Servie Type</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[11] == 1)
                                <input type="checkbox" class="custom-control-input" id="service_type" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="service_type">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="service_type">
                                @endif
                                <label class="custom-control-label" for="service_type"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="allinclusive">Allinclusive</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[12] == 1)
                                <input type="checkbox" class="custom-control-input" id="allinclusive" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="allinclusive">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="allinclusive">
                                @endif
                                <label class="custom-control-label" for="allinclusive"></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-3 control-label" for="departure_date">Departure Date</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[13] == 1)
                                <input type="checkbox" class="custom-control-input" id="departure_date" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="departure_date">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="departure_date">
                                @endif
                                <label class="custom-control-label" for="departure_date"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="num_person">Number of Person</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[14] == 1)
                                <input type="checkbox" class="custom-control-input" id="num_person" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="num_person">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="num_person">
                                @endif
                                <label class="custom-control-label" for="num_person"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="num_offer">Number of Offer</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[15] == 1)
                                <input type="checkbox" class="custom-control-input" id="num_offer" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="num_offer">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="num_offer">
                                @endif
                                <label class="custom-control-label" for="num_offer"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="latitude">Latitude</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[16] == 1)
                                <input type="checkbox" class="custom-control-input" id="latitude" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="latitude">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="latitude">
                                @endif
                                <label class="custom-control-label" for="latitude"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="longitude">Longitude</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[17] == 1)
                                <input type="checkbox" class="custom-control-input" id="longitude" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="longitude">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="longitude">
                                @endif
                                <label class="custom-control-label" for="longitude"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option1">Option1</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[18] == 1)
                                <input type="checkbox" class="custom-control-input" id="option1" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="option1">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="option1">
                                @endif
                                <label class="custom-control-label" for="option1"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option2">Option2</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[19] == 1)
                                <input type="checkbox" class="custom-control-input" id="option2" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="option2">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="option2">
                                @endif
                                <label class="custom-control-label" for="option2"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option3">Option3</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[20] == 1)
                                <input type="checkbox" class="custom-control-input" id="option3" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="option3">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="option3">
                                @endif
                                <label class="custom-control-label" for="option3"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option4">Option4</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[21] == 1)
                                <input type="checkbox" class="custom-control-input" id="option4" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="option4">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="option4">
                                @endif
                                <label class="custom-control-label" for="option4"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option5">Option5</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($category))
                                @if ($category->show_array[22] == 1)
                                <input type="checkbox" class="custom-control-input" id="option5" checked>
                                @else
                                <input type="checkbox" class="custom-control-input" id="option5">
                                @endif
                                @else
                                <input type="checkbox" class="custom-control-input" id="option5">
                                @endif
                                <label class="custom-control-label" for="option5"></label>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" id="hid-category-id" value="@if(isset($category)){{$category->id}}@endif">

                    <!-- <button class="btn btn-primary">test</button> -->
                    
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="{{asset('view_js/category-config.js')}}"></script>
@endsection
