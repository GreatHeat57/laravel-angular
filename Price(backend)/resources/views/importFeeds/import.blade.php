@extends('layouts.ly-home') @section('navItems')
<li class="nav-item d-none d-sm-inline-block">
    <h1 class="m-0 text-dark">Import Feed</h1>
</li>
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{url('/home')}}" class="nav-link">Admin</a>
</li>

<li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Import Feed</a>
</li>
@endsection @section('content')
<link rel="stylesheet" href="{{asset('theme_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<div class="row">
    <div class="col-12">
        <!-- feed config -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Import Feeds</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <a href="javascript:;" id='a-refresh-tbl'><i class="fas fa-redo-alt"></i></a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tbl-feed-list" class="table table-striped table-hover" style="display: none;">
                    <thead>
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle">Merchant Name</th>
                            <th class="align-middle">Interval Update</th>
                            <th class="align-middle">Parser Type</th>
                            <th class="align-middle">Active State</th>
                            <th class="align-middle">Category Alias</th>
                            <th class="align-middle">Import State</th>
                            <th class="align-middle">
                                <div class="custom-control custom-switch dark">
                                    <input type="checkbox" class="custom-control-input checked" id="active_state_all" checked>
                                    <label class="custom-control-label" for="active_state_all"></label>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedList as $key => $feed)
                        <tr data-index="{{$key}}">
                            <td>{{$key}}</td>
                            <td>{{$feed->merchant_name}}</td>
                            <td>{{$feed->interval_hours}}</td>
                            <td>{{$feed->parser_cls}}</td>
                            <td>
                                @if ($feed->active_state == '1')
                                <i class="fas fa-check"></i>
                                @else
                                <i class="fas fa-times"></i>
                                @endif
                            </td>
                            <td>{{$feed->category_alias}}</td>
                            <td class="import-state" data-id="{{$feed->id}}"></td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="active_state_{{$key}}" checked>
                                    <label class="custom-control-label" for="active_state_{{$key}}"></label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form action="" id="form-del-act" method="POST">
                @csrf
                @method('DELETE')
            </form>
            <form action="" id="form-edit-act" method="GET">
                @csrf
            </form>
            <div class="card-footer">
                <button class="btn btn-danger" id="btn-import-feed">Import Feed</button>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="{{asset('view_js/import-feeds.js')}}"></script>
<script src="{{ asset('theme_assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('theme_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection
