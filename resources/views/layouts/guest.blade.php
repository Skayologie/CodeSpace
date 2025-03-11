<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elegant Dashboard | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{ asset('storage/css/style.min.css') }}">
  @vite(['resources/css/app.css'])

</head>

<body>

{{$slot}}

<!-- Chart library -->
<script src="{{asset('storage/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('storage/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{asset('storage/js/app.js')}}"></script>  
<script src="{{asset('storage/js/script.js')}}"></script>
</body>

</html>
