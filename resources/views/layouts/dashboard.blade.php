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

    @include('inc.links')
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
</head>
<body class="hold-transition skin-red sidebar-mini">
    <div id="app">
        <!-- {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}} -->

        

        @include('inc.header')
        @include('inc.sidebar')

        <main class="content-wrapper">
                @yield('content_header')
                
                
              <section class="content">
                  @yield('content')
              </section>
        </main>
    </div>

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-validator.min.js')}}"></script>
    <script>

        $(document).ready(function(){
            
            // $("#add_student_form").on('submit', function(e){
            //     e.preventDefault();
            // });

            // $("#add_student_form").on('submit', function(e){
            //     e.preventDefault();
            //     $.ajax({
            //         url:$(this).attr('action'),
            //         method:$(this).attr('method'),
            //         data: new FormData(this),
            //         processData:false,
            //         dataType: 'json',
            //         contentType: false,
            //         beforeSend:function(){
            //             $(document).find('span.validation_error').text('');
            //         },
            //         success:function(data){ 
            //             if(data.status == 0){
            //                 $.each(data.error, function(prefix, val){
            //                     $('span.'prefix+'_error').text(val[0]);
            //                 })
            //             }else{
            //                 $("#add_student_form")[0].reset();
            //                 alert(data.msg);
            //             }

            //         }
            //     });
            // });
        });
        
        function isNumber(evt){
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true; 
        }
    </script>
</body>
</html>



