<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-editProfile{{Auth::user()->id}}">
    <i class="fa fa-edit"></i>EDIT
</button>


<div class="modal fade" id="modal-editProfile{{Auth::user()->id}}">
    <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">EDIT PROFILE</h4>
        </div>
        <div class="modal-body">
                {!! Form::open(["action" => "StudentAccesssController@profilePage", "method" => "POST" , "class" => "addForm"]) !!}
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            {{Form::label("", "Firstname")}}
                            <span class="text-danger">*</span>
                            <input type="text" value="{{Auth::user()->firstname}}" class="form-control" name="firstname">
                        </div>
                        <div class="form-group col-md-4">
                            {{Form::label("", "Middlename")}}
                            <span class="text-danger">*</span>
                            <input type="text" value="{{Auth::user()->middlename}}" class="form-control" name="middlename">
                        </div>
                        <div class="form-group col-md-4">
                            {{Form::label("", "Lastname")}}
                            <span class="text-danger">*</span>
                            <input type="text" value="{{Auth::user()->lastname}}" class="form-control" name="lastname">
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label("", "Contact")}}
                            <span class="text-danger">*</span>
                            <input type="number"  value="{{Auth::user()->contact}}" class="form-control" name="contact" >
                        </div>
                   
    
                        <div class="col-md-4">
                            {{Form::label("", "Email")}}
                            <span class="text-danger">*</span>
                            <input type="email" name="email"  class="form-control" placeholder="{{Auth::user()->email}}" disabled>
                        </div>

                        <div class="col-md-4">
                            {{Form::label("", "Gender")}}
                            <span class="text-danger">*</span>
                            <select name="gender" class="form-control">
                                <option  value="{{Auth::user()->gender}}" hidden selected>{{Auth::user()->gender}}</option>
                                <option value="male">male</option>
                                <option value="female">fmale</option>
                            </select>
                        </div>

                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label("", "Birthplace")}}
                            <span class="text-danger">*</span>
                            <input type="text"  value="{{Auth::user()->birthplace}}" class="form-control" name="birthplace">
                        </div>
    
    
                        <div class="col-md-4">
                            {{Form::label("", "Birthdate")}}
                            <span class="text-danger">*</span>
                            <input type="date"  value="{{Auth::user()->birthdate}}" class="form-control" name="birthdate">
                        </div>

                        <div class="col-md-4">
                            {{Form::label("", "Address")}}
                            <span class="text-danger">*</span>
                            <input type="text"  value="{{Auth::user()->address}}" class="form-control" name="address">
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <button class="btn btn-primary btn_add_student" type="submit">add student</button>
                        </div>
                    </div>
                {!! Form::close() !!}  
        </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
        </div>
    </div>
</div>

{{-- <script defer>


    const BtnAddStudent = document.querySelector('.btn_add_student');

    BtnAddStudent.addEventListener('submit', (e) =>{
        e.preventDefault();
        console.log('asdasd');
    })
</script> --}}