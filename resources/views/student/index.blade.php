@extends('access_admin.application')

@section('application')
    <div class="container-fluid">
        <div style="display: flex; align-items:center; justify-content:space-between;">
            @if ($message = Session::get('message'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif             
            @include('modal.addStudent')
            <div style="display: flex; gap: 10px;">
                <form action="{{route('pdf')}}" method="post" target="_blank">
                    @csrf
                    <button class="btn btn-warning" data-tooltip="export as PDF"> <i class="fa fa-download"></i> PDF </button>
                </form>
                
                <a href="{{route('import-excel')}}"  class="btn btn-success" data-tooltip="import Excel"><i class="fa fa-download"></i> EXCEL</a>

                <form action="{{route('export-excel')}}">
                    @csrf
                    <button class="btn btn-info" data-tooltip="Export as Excel"> <i class="fa fa-upload"></i> EXCEL </button>
                </form>
            </div>
        </div>
        <table class="table" id="studentsTable">
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
                <th scope="col">age</th>
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
                            <td>{{ $student->age}}</td>
                            <td>{{ $student->birthplace}}</td>
                            <td>{{ $student->address}}</td>
                            <td style="display: flex; align-items:center; gap:5px;">

                                @include('modal.editStudent')
                                {{-- <button class="btn btn-success"> <i class="fa fa-edit"></i></button> --}}

                              
                                {!! Form::open(['action' => ['StudentController@destroy', $student->id], 'method' => 'SUBMIT']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button class="btn btn-danger" type="submit" data-tooltip="delete"> <i class="fa  fa-trash"></i></button>
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
@endsection
