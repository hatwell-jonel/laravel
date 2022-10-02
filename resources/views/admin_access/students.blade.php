@extends("layouts.admin")

@section('content_header') 
    <h1>Students</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div style="display: flex; align-items:center; justify-content:space-between;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addStudent" data-tooltip="add">
                <i class="fa fa-plus-square"></i> Student
            </button>
            @include('modal.addStudent')

            <div style="display: flex; gap: 10px;">
                <form action="{{route('pdf')}}" method="post" target="_blank">
                    @csrf
                    <button class="btn btn-warning" data-tooltip="export as PDF"> <i class="fa fa-download"></i> PDF </button>
                </form>
                
                <a href="{{route('importView')}}"  class="btn btn-success" data-tooltip="import Excel"><i class="fa fa-download"></i> EXCEL</a>

                <form action="{{route('export-excel')}}">
                    @csrf
                    <button class="btn btn-info" data-tooltip="Export as Excel"> <i class="fa fa-upload"></i> EXCEL </button>
                </form>
            </div>
        </div>
        <div class="table-responsive" style="margin-top: 30px; background:white; padding:1rem;">
            <table class="table table-bordered table-striped table-condensed" id="studentsTable">
                <thead>
                  <tr>
                    <th scope="col">Student #</th>
                    <th>Firstname</th>
                    <th>Middlename</th>
                    <th>Lastname</th>
                    <th>age</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>birthdate</th>
                    <th>birthplace</th>
                    <th>address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->student_id}}</td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->middlename}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->age}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->contact}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{ date('M d, Y', strtotime($student->birthdate))}}</td>
                            <td>{{$student->birthplace}}</td>
                            <td>{{$student->address}}</td>
                            <td>

                                <button type="button" class="btn btn-info editModal" data-toggle="modal" data-tooltip="edit" data-target="#modal-editStudent{{$student->student_id}}">
                                    <i class="fa fa-edit" ></i>
                                </button>
                                @include('modal.editStudent')

                                <a class="btn btn-danger" href="{{url('/admin_access/student/'. $student->id)}}" data-tooltip="delete"> <i class="fa  fa-trash"></i></a>

                                {{-- <form action=""{{route('detroy.student', $student->id)}} method="submit">
                                    @method("DELETE")
                                    <button class="btn btn-danger" type="submit" data-tooltip="delete"> <i class="fa  fa-trash"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @yield('student_list') --}}
@endsection