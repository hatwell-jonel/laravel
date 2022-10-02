<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/tooltip.css') }}" rel="stylesheet">

    @include('inc.upperlink')
</head>


<body class="hold-transition skin-red sidebar-mini">

    <div id="app">
        <x-header></x-header>
        <x-sidebar></x-sidebar>
            
        <main class="content-wrapper">
            <section class="content-header">
                @yield('content_header')
            </section>
          <section class="content">
              @yield('content')
          </section>
        </main>
    </div>

    @include('inc.lowerlink')

    {{-- Functions for charts to get the data from database --}}
    <script src="{{asset('js/charts.js')}}"></script>
    {{-- Implementing of Data tables to tables --}}
    <script src="{{asset('js/datatables.js')}}"></script>
    <script>
        function preventNumbers(e){
            let keyCode = (e.keyCode ? e.keyCode : e.which);
            if(keyCode > 47 && keyCode < 58  || keyCodem > 95 && keyCode < 107){
                e.preventDefault();
            }
        }
    </script>
</body>
</html>



