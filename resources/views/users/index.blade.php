@extends('access_admin.accounts')

@section('admin_account')
    <div class="container-fluid">
        <div style="display: flex; align-items:center; justify-content:space-between;">
            @include('modal.addAdmin')

            {{-- <div class="">
                <form action="{{route('pdf')}}" method="post" target="_blank">
                    @csrf
                    <button class="btn btn-warning"> <i class="fa fa-download"></i> PDF </button>
                </form>
                
                <button class="btn btn-success"> <i class="fa fa-download"></i> EXCEL </button>

                <form action="{{route('export-excel')}}">
                    @csrf
                    <button class="btn btn-info"> <i class="fa fa-upload"></i> EXCEL </button>
                </form>
            </div> --}}
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">admin #</th>
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
            <tbody>
              @if(count($admins) >= 1)
                @foreach($admins as $admin)
                  <tr> 
                    <th scope="row">{{$admin->admin_id}}</th>
                    <td>{{$admin->firstname}}</td>
                    <td>{{$admin->middlename}}</td>
                    <td>{{$admin->lastname}}</td>
                    <td>{{$admin->contact}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->gender}}</td>
                    <td>{{$admin->birthdate}}</td>
                    <td>{{$admin->birthplace}}</td>
                    <td>{{$admin->address}}</td>
                    <td style="display: flex; align-items:center; gap:5px;">
                      @include('modal.editAdmin')
                      {!! Form::open(['action' => ['AdminController@destroy', $admin->id], 'method' => 'SUBMIT']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        <button class="btn btn-danger" type="submit"> <i class="fa  fa-trash"></i></button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
                @else
                <p>No data found.</p>
              @endif
        
            </tbody>
          </table>
    </div>
@endsection