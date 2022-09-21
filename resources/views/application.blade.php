@extends('layouts.app')

@section('content')

    {{-- <div class="container-fluid">
        @include('modal.addStudent')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Student #</th>
                <th scope="col">Name</th>
                <th scope="col">contact</th>
                <th scope="col">email</th>
                <th scope="col">gender</th>
                <th scope="col">birthdate</th>
                <th scope="col">birthplace</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Student #</td>
                <td>Name</td>
                <td>contact</td>
                <td>email</td>
                <td>gender</td>
                <td>birthdate</td>
                <td>birthplace</td>
                <td class="d-flex">
                    <button class="btn btn-success"> <i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger"> <i class="fa  fa-trash"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div> --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                application
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
