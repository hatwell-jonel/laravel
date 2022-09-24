@extends('layouts.dashboard')

@section('content_header')   
    <section class="content-header">
        <h1 class="text-capitalize">Application</h1>
    </section>
@endsection

@section('content')
    <!--  content is in student/index -->
    @yield('application')

    @stack('script')
@endsection


