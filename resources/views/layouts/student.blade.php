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
        <x-header_user></x-header_user>
        <x-sidebar_user></x-sidebar_user>
            
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
    <script defer>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').css('background-image', 'url('+ URL::to('') +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>
</body>
</html>



