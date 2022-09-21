@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('modal.addStudent')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Student #</th>
                <th scope="col">firstname</th>
                <th scope="col">middlename</th>
                <th scope="col">lastname</th>
                <th scope="col">contact</th>
                <th scope="col">email</th>
                <th scope="col">gender</th>
                <th scope="col">birthdate</th>
                <th scope="col">birthplace</th>
                <th scope="col">address</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            @if(count($students) >= 1)
            <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td><a href="/students/{{$student->id}}">{{ $student->student_id}}</a></td>
                            <td>{{ $student->firstname}}</td>
                            <td>{{ $student->middlename}}</td>
                            <td>{{ $student->lastname}}</td>
                            <td>{{ $student->contact}}</td>
                            <td>{{ $student->email}}</td>
                            <td>{{ $student->gender}}</td>
                            <td>{{ $student->birthdate}}</td>
                            <td>{{ $student->birthplace}}</td>
                            <td>{{ $student->address}}</td>
                            <td class="d-flex">

                                @include('modal.editStudent')
                                {{-- <button class="btn btn-success"> <i class="fa fa-edit"></i></button> --}}

                                {!! Form::open(['action' => ['StudentController@destroy', $student->id], 'method' => 'SUBMIT']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button class="btn btn-danger" type="submit"> <i class="fa  fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    @else
                        <p>No Data found.</p>
                @endif
            </tbody>
        </table>
    </div>
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
