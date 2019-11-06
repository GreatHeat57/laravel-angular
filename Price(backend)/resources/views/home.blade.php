@extends('layouts.ly-home') @section('navItems')
<li class="nav-item d-none d-sm-inline-block">
    <h1 class="m-0 text-dark">Home</h1>
</li>
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{url('/home')}}" class="nav-link">Admin</a>
</li>

<li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Home</a>
</li>

@endsection @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif You are logged in!
                </div>
                <div class="icheck-primary"></div>
            </div>
        </div>
    </div>
</div>
@endsection