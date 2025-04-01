<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Space | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
    <!-- Custom styles -->
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
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">

    <x-sidebar></x-sidebar>




    <div class="main-wrapper">
        <!-- ! Main nav -->
        @include('layouts.partials.navigation')


        <!-- ! Main -->
         <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">

          {{ $slot }}

      </div>
    </main>
    <!-- ! Footer -->
        <!-- ! Footer -->
        @include('layouts.partials.footer')

    </div>







</div>
<!-- Chart library -->
<script src="{{asset('storage/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{asset('storage/plugins/feather.min.js')}}"></script>
<!-- Main App Js Script -->
<script src="{{ asset('js/app.js') }}"></script>

<script src="https://kit.fontawesome.com/352cf65264.js" crossorigin="anonymous"></script>

</body>

</html>
