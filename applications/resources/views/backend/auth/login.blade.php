<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sportopia Login</title><meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/matrix-login.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
  <div id="loginbox">
    <form id="loginform" class="form-vertical" action="#">
      <div class="control-group normal_text">
        {{-- <h3><img src="img/logo.png" alt="Logo" /></h3> --}}
        <h3>Sportopia Login</h3>
      </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
            <span class="pull-right"><a type="submit" href="{{ route('dashboard') }}" class="btn btn-success" /> Login</a></span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
		    <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><a class="btn btn-info"/>Recover</a></span>
        </div>
    </form>
    <div class="control-group normal_text">
      <h3>by Amadeo.id</h3>
    </div>
    </div>

    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/matrix.login.js') }}"></script>
</body>

</html>