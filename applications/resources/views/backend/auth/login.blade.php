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
    @if(Session::has('status'))
      <script>
      window.setTimeout(function() {
        $(".alert-error").fadeTo(700, 0).slideUp(700, function(){
          $(this).remove();
        });
      }, 5000);
      </script>
        <div class="alert alert-error">
          <button class="close" data-dismiss="alert">×</button>
          <strong>Error!</strong> {{ Session::get('status')}}
        </div>
    @endif

    <form id="loginform" class="form-vertical" action="{{ route('login.admin.post')}}" method="POST">
    {{ csrf_field() }}
      <div class="control-group normal_text">
        <h3><img src="{{ asset('amadeo/images/logo-cms.png') }}" alt="Logo" /></h3>
        <h3>Login</h3>
      </div>
        <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
          <div class="controls">
              <div class="main_input_box">
                @if ($errors->has('email'))
                <script>
                window.setTimeout(function() {
                  $(".help-block").fadeTo(700, 0).slideUp(700, function(){
                    $(this).remove();
                  });
                }, 3000);
                </script>
                <span class="help-block">{{ $errors->first('email')}}</span>
                @endif
                <span class="add-on bg_lg"><i class="icon-envelope"> </i></span><input type="text" placeholder="Email" name="email" value="{{ old('email') }}"/>
              </div>
          </div>
        </div>
        <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
          <div class="controls">
              <div class="main_input_box">
                @if ($errors->has('password'))
                  <script>
                  window.setTimeout(function() {
                    $(".help-block").fadeTo(700, 0).slideUp(700, function(){
                      $(this).remove();
                    });
                  }, 3000);
                  </script>
                  <span class="help-block">{{ $errors->first('password')}}</span>
                @endif
                <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" />
              </div>
          </div>
        </div>
        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
            <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
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
