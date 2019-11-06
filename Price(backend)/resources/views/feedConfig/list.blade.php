@extends('layouts.ly-home') @section('navItems')
<li class="nav-item d-none d-sm-inline-block">
    <h1 class="m-0 text-dark">Category List</h1>
</li>
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{url('/home')}}" class="nav-link">Admin</a>
</li>

<li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Feed List</a>
</li>
@endsection @section('content')
<link rel="stylesheet" href="{{asset('theme_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<div class="row">
    <div class="col-12">
        <!-- feed config -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Data Feed List</h3>
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
                            <th class="text-center align-middle">Feed Url</th>
                            <th class="align-middle">Interval Update</th>
                            <th class="align-middle">Parser Type</th>
                            <th class="align-middle">Active State</th>
                            <th class="align-middle">Category Alias</th>
                            <th class="align-middle">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedList as $key => $feed)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$feed->merchant_name}}</td>
                            <td>{{$feed->feed_url}}</td>
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
                            <td>
                                <a href="javascript:;" title="edit" class="edit-feed" data-id="{{$feed->id}}"><i class="fas fa-edit"></i></a>
                                <a href="javascript:;" title="edit" class="del-feed" style="margin-left:10px;" data-id="{{$feed->id}}"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="" id="form-del-act" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                <form action="" id="form-edit-act" method="GET">
                    @csrf
                </form>
                
            </div>
            
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="{{asset('view_js/feed-list.js')}}"></script>
<script src="{{ asset('theme_assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('theme_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection
