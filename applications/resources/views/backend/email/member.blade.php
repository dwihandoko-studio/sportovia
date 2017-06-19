<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p>
      Hai, {{ $data[0]['name'] }}.
    </p>

    <p>
      You have been registered Sportopia.com
      <br>Please click the following link to activate your account :<br><br>
      Email : {{ $data[0]['email'] }}<br><br>
      Password : {{ $data[0]['password'] }}<br><br>
      <a href="{{ URL::to('member-area/login/') }}">
        {{ URL::to('member-area/login/') }}
      </a>
    </p>

  </body>
</html>
