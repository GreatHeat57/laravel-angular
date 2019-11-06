@extends('layouts.ly-home') @section('navItems')
<li class="nav-item d-none d-sm-inline-block">
    <h1 class="m-0 text-dark">Category List</h1>
</li>
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{url('/home')}}" class="nav-link">Admin</a>
</li>

<li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Category List</a>
</li>
@endsection @section('content')
<link rel="stylesheet" href="{{asset('theme_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<div class="row">
    <div class="col-12">
        <!-- feed config -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                    <!-- Here is a label for example -->
                    <a href="javascript:;" id='a-refresh-tbl'><i class="fas fa-redo-alt"></i></a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tbl-category-list" class="table table-striped table-hover" style="display: none;">
                    <thead>
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle">Category Name</th>
                            <th class="text-center align-middle">Search Items</th>
                            <th class="text-center align-middle">Show Items</th>
                            <th class="align-middle">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categoryList as $key => $category)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$category[1]}}</td>
                            <td>{{$category[2]}}</td>
                            <td>{{$category[3]}}</td>
                            <td><a href="javascript:;" class="edit-category" data-id="{{$category[4]}}" title="edit"><i class="fas fa-edit"></i></a><a href="javascript:;" title="edit" class="del-category" style="margin-left:10px;" data-id="{{$category[4]}}"><i class="fas fa-trash-alt"></i></a></td>
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
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script src="{{asset('view_js/category-list.js')}}"></script>
<script src="{{ asset('theme_assets/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('theme_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
@endsection
