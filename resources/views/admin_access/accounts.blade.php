@extends("layouts.admin")

@section('content_header') 
    <h1>Accounts</h1>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addAdmin" data-tooltip="add">
                <i class="fa fa-plus-square"></i> Admin
            </button>
            @include('modal.addAdmin')
        </div>

        <div class="table-responsive" style="margin-top: 30px; background:white; padding:1rem;">
            <table class="table table-bordered table-striped table-condensed" id="adminsTable">
                <thead>
                    <tr>
                      <th scope="col">Admin #</th>
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
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->admin_id}}</td>
                            <td>{{$admin->firstname}}</td>
                            <td>{{$admin->middlename}}</td>
                            <td>{{$admin->lastname}}</td>
                            <td>{{$admin->age}}</td>
                            <td>{{$admin->gender}}</td>
                            <td>{{$admin->contact}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{ date('M d, Y', strtotime($admin->birthdate))}}</td>
                            <td>{{$admin->birthplace}}</td>
                            <td>{{$admin->address}}</td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-editAdmin{{$admin->admin_id}}" data-tooltip="edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                @include('modal.editAdmin')


                                <a class="btn btn-danger" href="{{url('/admin_access/account/'. $admin->id)}}" data-tooltip="delete"> <i class="fa  fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection