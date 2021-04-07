<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/perpus.png') }}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.css')}}>
    <link rel="stylesheet" href="{{ asset('../css/style.css') }}">
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <title>Perpustakaan</title>
  </head>
  <body>
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>

