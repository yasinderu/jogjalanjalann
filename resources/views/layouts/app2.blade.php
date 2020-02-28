<!DOCTYPE html>
<html lang="en">
<head>
  <title>Jogjalanjalan.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('js/navbar.js') }}"></script>  
  <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>


</head>
<body>
	@yield('content')
</body>