<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Dashboard | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('storage/css/style.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

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
