<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('panda.name') }}</title>
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="extend-js/jquery-3.6.0.js"></script>
    {{-- <script src="extend-js/toast.js"></script> --}}
    {{-- <link href="dist/toasty.min.css" rel="stylesheet"> --}}
    {{-- <script src="dist/toasty.min.js"></script> --}}
</head>

<body>
    @if (!isset($no_frame))
        @include(viewIndex('layouts.navbar'))
        @include(viewIndex('layouts.sidebar'))
        <div class="panda-content">
            @include(viewIndex('components.breadcrumb'))
            @yield('content')
            @include('layouts.footer')
        </div>
    @else
        @yield('content')
    @endif
</body>

</html>
