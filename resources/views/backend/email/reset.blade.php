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
      Your password has been reset on CMS Sportopia account.
      <br>Please login with
      <br><br>
      Email : {{ $data[0]['email'] }}<br>
      Password : 12345678
      <br><br>
      <br><br>

      <a href="{{ URL::to('admin/login') }}">
        {{ URL::to('admin/login/') }}
      </a>
    </p>

  </body>
</html>
