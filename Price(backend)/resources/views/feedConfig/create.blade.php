@extends('layouts.ly-home') @section('navItems')
<li class="nav-item d-none d-sm-inline-block">
    <h1 class="m-0 text-dark">Feed Configration</h1>
</li>
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{url('/home')}}" class="nav-link">Admin</a>
</li>

<li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Feed Configration</a>
</li>
@endsection @section('content')
<div class="row">
    <div class="col-5">
        <!-- feed config -->
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Data Feed Configration</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="form-horizontal" id="form-feed-config">
                    @csrf
                    <input type="hidden" id="hid-feed-data-id" value="@if(isset($feed)){{$feed->id}}@endif">
                    <div class="form-group row">
                        <label class="col-3 control-label" for="merchant_name">Merchant/Name</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="merchant_name" name="merchant_name" placeholder="Merchant/Name" value="@if (isset($feed)){{$feed->merchant_name}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="update_freq">Update Freq.</label>
                        <div class="col-9 input-group">
                            <input type="number" min="0" class="form-control" id="update_freq" name="update_freq" value="@if (isset($feed)){{$feed->interval_hours}}@endif" placeholder="Update Freq.">
                            <div class="input-group-append">
                                <span class="input-group-text">Hours</span>
                            </div>
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="feed_url">Feed Url</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="feed_url" name="feed_url" placeholder="Feed Url" value="@if (isset($feed)){{$feed->feed_url}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="parser_cls">Parser/Class</label>
                        <div class="col-9">
                            <select class="custom-select" id="parser_cls">
                                @if (isset($feed))
                                    @if ($feed->parser_cls == 'xml')
                                    <option value="xml" selected>XML</option>
                                    @else
                                    <option value="xml">XML</option>
                                    @endif
                                @else
                                <option value="xml">XML</option>
                                @endif

                                @if (isset($feed))
                                    @if ($feed->parser_cls == 'csv_semi')
                                    <option value="csv_semi" selected>CSV ; &</option>
                                    @else
                                    <option value="csv_semi">CSV ; &</option>
                                    @endif
                                @else
                                <option value="csv_semi">CSV ; &</option>
                                @endif

                                @if (isset($feed))
                                    @if ($feed->parser_cls == 'csv_auto')
                                    <option value="csv_auto" selected>CSV/Autodetect(,)</option>
                                    @else
                                    <option value=csv_auto>CSV/Autodetect(,)</option>
                                    @endif
                                @else
                                <option value=csv_auto>CSV/Autodetect(,)</option>
                                @endif

                                @if (isset($feed))
                                    @if ($feed->parser_cls == 'csv_tab')
                                    <option value="csv_tab" selected>CSV tab &</option>
                                    @else
                                    <option value=csv_tab>CSV tab &</option>
                                    @endif
                                @else
                                <option value=csv_tab>CSV tab &</option>
                                @endif

                                @if (isset($feed))
                                    @if ($feed->parser_cls == 'csv_tab')
                                    <option value="csv_logic" selected>CSV | &</option>
                                    @else
                                    <option value=csv_logic>CSV | &</option>
                                    @endif
                                @else
                                <option value=csv_logic>CSV | &</option>
                                @endif
                            </select>
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="category_config_id">Categroy Group</label>
                        <div class="col-9">
                            <select class="custom-select" id="category_config_id" selected-val="@if(isset($feed)){{$feed->category_config_id}}@endif">
                                @foreach($categoryConfigIdList as $key => $categoryId)
                                <option value="{{$categoryId['id']}}">{{$categoryId['text']}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="category_alias">Category Alias</label>
                        <div class="col-9 input-group">
                            <input type="text" class="form-control" id="category_alias" name="category_alias" placeholder="Category Name"
                                value="@if (isset($feed)){{$feed->category_alias}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="min_price">Minimum Price</label>
                        <div class="col-9 input-group">
                            <input type="number" class="form-control" min="0" id="min_price" name="min_price" placeholder="Minimum Price of Feed"
                                value="@if (isset($feed)){{$feed->min_price}}@endif">
                            <span class="invalid-feedback" role="alert"><strong></strong></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="active_state">Active State</label>
                        <div class="custom-control custom-switch col-9" style="padding-left:.7rem; padding-top: 7px;">
                            <div class="custom-control custom-switch">
                                @if (isset($feed))
                                    @if ($feed->active_state == 1)
                                    <input type="checkbox" class="custom-control-input" id="active_state" checked>
                                    @else
                                    <input type="checkbox" class="custom-control-input" id="active_state">
                                    @endif
                                @else
                                    <input type="checkbox" class="custom-control-input" id="active_state">
                                @endif
                                <label class="custom-control-label" for="active_state"></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="button" class="btn btn-success offset-3" id="btn-get-exam-feed">Get Example Feed Item</button>
                @if (isset($feed))
                <button type="button" class="btn btn-danger" id="btn-update-feed">Update Feed</button>
                @else
                <button type="button" class="btn btn-danger" id="btn-save-feed">Save Feed</button>
                @endif
            </div>
        </div>
        <!-- database mapping -->
        <div class="card card-primary" id="feed-mapping-card">
            <div class="card-header">
                <h3 class="card-title">Feed to Database Mapping</h3>
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
                        <label class="col-3 control-label" for="title">Title</label>
                        <div class="col-9">
                            <select class="custom-select" id="title" selected-val="@if(isset($feed)){{$feed->title}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="price">Price</label>
                        <div class="col-9">
                            <select class="custom-select" id="price" selected-val="@if(isset($feed)){{$feed->price}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="buy_link">Buy Link</label>
                        <div class="col-9">
                            <select class="custom-select" id="buy_link" selected-val="@if(isset($feed)){{$feed->buy_link}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="img">Image</label>
                        <div class="col-9">
                            <select class="custom-select" id="img" selected-val="@if(isset($feed)){{$feed->image}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="descript">Description</label>
                        <div class="col-9">
                            <select class="custom-select" id="descript" selected-val="@if(isset($feed)){{$feed->descript}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="traveltype">Traveltype</label>
                        <div class="col-9">
                            <select class="custom-select" id="traveltype" selected-val="@if(isset($feed)){{$feed->travel_type}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="duration">Duration</label>
                        <div class="col-9">
                            <select class="custom-select" id="duration" selected-val="@if(isset($feed)){{$feed->duration}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="country">Country</label>
                        <div class="col-9">
                            <select class="custom-select" id="country" selected-val="@if(isset($feed)){{$feed->country}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="region">Region</label>
                        <div class="col-9">
                            <select class="custom-select" id="region" selected-val="@if(isset($feed)){{$feed->region}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="city">City</label>
                        <div class="col-9">
                            <select class="custom-select" id="city" selected-val="@if(isset($feed)){{$feed->city}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="stars">Stars</label>
                        <div class="col-9">
                            <select class="custom-select" id="stars" selected-val="@if(isset($feed)){{$feed->stars}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="rating">Rating</label>
                        <div class="col-9">
                            <select class="custom-select" id="rating" selected-val="@if(isset($feed)){{$feed->rating}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-3 control-label" for="servicetype">Servicetype</label>
                        <div class="col-9">
                            <select class="custom-select" id="servicetype" selected-val="@if(isset($feed)){{$feed->service_type}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="allinclusive">Allinclusive</label>
                        <div class="col-9">
                            <select class="custom-select" id="allinclusive" selected-val="@if(isset($feed)){{$feed->allinclusive}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="departuredate">Departuredate</label>
                        <div class="col-9">
                            <select class="custom-select" id="departuredate" selected-val="@if(isset($feed)){{$feed->departure_date}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="numberofpersons">Number of Persons</label>
                        <div class="col-9">
                            <select class="custom-select" id="numberofpersons" selected-val="@if(isset($feed)){{$feed->num_person}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="numberofreviews">Number Of offers</label>
                        <div class="col-9">
                            <select class="custom-select" id="numberofreviews" selected-val="@if(isset($feed)){{$feed->num_offer}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="latitude">Latitude</label>
                        <div class="col-9">
                            <select class="custom-select" id="latitude" selected-val="@if(isset($feed)){{$feed->latitude}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-3 control-label" for="longitude">Longitude</label>
                        <div class="col-9">
                            <select class="custom-select" id="longitude" selected-val="@if(isset($feed)){{$feed->longitude}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option1">Option1</label>
                        <div class="col-9">
                            <select class="custom-select" id="option1" selected-val="@if(isset($feed)){{$feed->option1}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 control-label" for="option2">Option2</label>
                        <div class="col-9">
                            <select class="custom-select" id="option2" selected-val="@if(isset($feed)){{$feed->option2}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option3">Option3</label>
                        <div class="col-9">
                            <select class="custom-select" id="option3" selected-val="@if(isset($feed)){{$feed->option3}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 control-label" for="option4">Option4</label>
                        <div class="col-9">
                            <select class="custom-select" id="option4" selected-val="@if(isset($feed)){{$feed->option4}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-3 control-label" for="option5">Option5</label>
                        <div class="col-9">
                            <select class="custom-select" id="option5" selected-val="@if(isset($feed)){{$feed->option5}}@endif">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                </form>
                
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-7">
        <!-- example item -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Example Feed Item</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="exam-feed-div">Please Fetch Example Feed Item</div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="{{asset('view_js/feed-config.js')}}"></script>
@endsection
