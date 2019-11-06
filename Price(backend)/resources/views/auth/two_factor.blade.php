<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PCSV | Enter Code</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('theme_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('theme_assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper" style="width: 600px">
  <div class="lockscreen-logo">
    <a href="{{url('/')}}"><b>Price Compare System</b> <br> for vacations</a>
  </div>
  <!-- User name -->
  {{-- <div class="lockscreen-name">John Doe</div> --}}

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item" style="width:345px">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{asset('theme_assets/dist/img/user1-128x128.jpg')}}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" role="form" method="POST" action="/2fa">
        {{ csrf_field() }}  
        <div class="input-group">
            <input id="2fa" type="text" class="form-control" name="2fa" placeholder="Enter the code you received here" required autofocus>

            <div class="input-group-append">
            <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
            </div>

        </div>
        @if ($errors->has('2fa'))
        <span class="help-block">
        <strong>{{ $errors->first('2fa') }}</strong>
        </span> 
        @endif
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">        
        <form class="d-inline" method="POST" action="http://localhost:8000/email/resend">
            {{ csrf_field() }}	
            <b>If you did not receive the email</b>,
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button>.
        </form>
  </div>
  <div class="lockscreen-footer text-center">
      <br>
    Copyright &copy; 2019 <b> Price Compare System </b><br>
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="{{asset('theme_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('theme_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body> 
</html>

{{-- <form role="form" method="POST" action="/2fa">
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <input id="2fa" type="text" class="form-control" name="2fa" placeholder="Enter the code you received here." required autofocus>
        
        @if ($errors->has('2fa'))
        <span class="help-block">
        <strong>{{ $errors->first('2fa') }}</strong>
        </span> 
        @endif

    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Send</button>
    </div>
</form> --}}