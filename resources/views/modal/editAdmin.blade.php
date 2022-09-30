
<div class="modal fade" id="modal-editAdmin{{$admin->admin_id}}">
    <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Admin:{{$admin->admin_id}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('update.admin', $admin->admin_id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_firstname">Firstname</label>
                            <input type="text" value="{{$admin->firstname}}" class="form-control" name="update_admin_firstname" id="update_admin_firstname"  minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                        </div>
                        <div class="form-group col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_middlename">Middlename</label>
                            <input type="text"  value="{{$admin->middlename}}" class="form-control" name="update_admin_middlename" id="update_admin_middlename"  minlength="2" onkeydown="return /[a-z]/i.test(event.key)">
                        </div>
                        <div class="form-group col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_lastname">Lastname</label>
                            <input type="text"  value="{{$admin->lastname}}" class="form-control" name="update_admin_lastname" id="update_admin_lastname" minlength="2"  onkeydown="return /[a-z]/i.test(event.key)" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_contact">Contact</label>
                            <input type="number" value="{{$admin->contact}}" class="form-control" name="update_admin_contact" id="update_admin_contact" >
                            
                        </div>
                   
                        <div class="col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_email">Email</label>
                            <input type="email" value="{{$admin->email}}"  class="form-control" name="update_admin_email" id="update_admin_email">
                            
                        </div>

                        <div class="col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_gender">Gender</label>
                            <select name="update_admin_gender" id="update_admin_gender" class="form-control">
                                
                                <option value="{{$admin->gender}}" hidden selected>{{$admin->gender}}</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_birthplace">Birthplace</label>
                            <input type="text" value="{{$admin->birthplace}}" class="form-control" name="update_admin_birthplace" id="update_admin_birthplace">
                        </div>
    
    
                        <div class="col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_birthdate">Birthdate</label>
                            <input type="date" value="{{$admin->birthdate}}" class="form-control" name="update_admin_birthdate" id="update_admin_birthdate">
                        </div>

                        <div class="col-md-4" style="display: flex; flex-direction: column;">
                            <label for="update_admin_address">Address</label>
                            <input type="text" value="{{$admin->address}}" class="form-control" name="update_admin_address" id="update_admin_address">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                             <button class="btn btn-primary" style="width:100%; text-transform:uppercase;" type="submit">Edit admin</button>
                         </div>
                     </div>

                </form>
            </div>
        </div>
    </div>
</div>
 
 
{{-- <div class="modal fade" id="modal-editAdmin{{$admin->admin_id}}">
     <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
         <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">Admin:{{$admin->admin_id}}</h4>
         </div>
         <div class="modal-body">
                 {!! Form::open(["action" => ["AdminController@update", $admin->id], "method" => "POST" , "class" => "addForm border border-danger"]) !!}
                     @csrf
                     <div class="row">
                         <div class="form-group col-md-4">
                             {{Form::label("", "Firstname")}}
                             <span class="text-danger">*</span>
                             <input type="text" value="{{$admin->firstname}}" class="form-control" name="admin_firstname"  minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                         </div>
                         <div class="form-group col-md-4">
                             {{Form::label("", "Middlename")}}
                             <span class="text-danger">*</span>
                             <input type="text"  value="{{$admin->middlename}}" class="form-control" name="admin_middlename"  minlength="2" onkeydown="return /[a-z]/i.test(event.key)">
                         </div>
                         <div class="form-group col-md-4">
                             {{Form::label("", "Lastname")}}
                             <span class="text-danger">*</span>
                             <input type="text"  value="{{$admin->lastname}}" class="form-control" name="admin_lastname" minlength="2"  onkeydown="return /[a-z]/i.test(event.key)" required>
                         </div>
 
                     </div>
                     
                     <div class="row">
                         <div class="col-md-4">
                             {{Form::label("", "Contact")}}
                             <span class="text-danger">*</span>
                             <input type="number" value="{{$admin->contact}}" class="form-control" name="admin_contact" >
                         </div>
                    
     
                         <div class="col-md-4">
                             {{Form::label("", "Email")}}
                             <span class="text-danger">*</span>
                             <input type="email" value="{{$admin->email}}"  class="form-control" name="admin_email">
                         </div>
 
                         <div class="col-md-4">
                             {{Form::label("", "Gender")}}
                             <span class="text-danger">*</span>
                             <select name="admin_gender" class="form-control">
                                 <option value="{{$admin->gender}}" hidden selected>{{$admin->gender}}</option>
                                 <option value="male">Male</option>
                                 <option value="female">Female</option>
                             </select>
                         </div>
                     </div>
                     
                     <div class="row">
                         <div class="col-md-4">
                             {{Form::label("", "Birthplace")}}
                             <span class="text-danger">*</span>
                             <input type="text" value="{{$admin->birthplace}}" class="form-control" name="admin_birthplace">
                         </div>
     
     
                         <div class="col-md-4">
                             {{Form::label("", "Birthdate")}}
                             <span class="text-danger">*</span>
                             <input type="date" value="{{$admin->birthdate}}" class="form-control" name="admin_birthdate">
                         </div>
 
                         <div class="col-md-4">
                             {{Form::label("", "Address")}}
                             <span class="text-danger">*</span>
                             <input type="text" value="{{$admin->address}}" class="form-control" name="admin_address">
                         </div>
                     </div>
                     
                     <div class="row" style="margin-top: 20px;">
                        {{ Form::hidden('_method', 'PUT') }}  
                        <div class="col-md-12">
                             <button class="btn btn-primary"type="submit">Edit admin</button>
                         </div>
                     </div>
                 {!! Form::close() !!}  
         </div>
     
         </div>
     </div>
 </div> --}}