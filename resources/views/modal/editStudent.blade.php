<button type="button" class="btn btn-primary editModal" data-toggle="modal" data-tooltip="edit" data-target="#modal-editStudent{{$student->student_id}}">
    <i class="fa fa-edit" ></i>
 </button>
 
 
 <div class="modal fade" id="modal-editStudent{{$student->student_id}}">
     <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
         <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">student: {{$student->student_id}}</h4>
         </div>
         <div class="modal-body">
                 {!! Form::open(["action" => ["StudentController@update", $student->id], "method" => "POST" , "class" => "addForm border border-danger"]) !!}
                     @csrf
                        <div class="row">
                         <div class="form-group col-md-4">
                             <label for="name">Firstname:</label>
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="firstname" value="{{$student->firstname}}" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                         </div>
                         <div class="form-group col-md-4">
                            <label for="name">Middlename:</label>
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="middlename" value="{{$student->middlename}}" minlength="2" onkeydown="return /[a-z]/i.test(event.key)">
                         </div>
                         <div class="form-group col-md-4">
                            <label for="name">Lastname:</label>
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="lastname" value="{{$student->lastname}}" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                         </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4">
                                {{Form::label("", "Contact")}}
                                <span class="text-danger">*</span>
                                <input type="number" class="form-control" name="contact" value="{{$student->contact}}">
                            </div>
                            <div class="col-md-4">
                                {{Form::label("", "Email")}}
                                <span class="text-danger">*</span>
                                <input type="email" name="email" class="form-control" value="{{$student->email}}">
                            </div>
                            <div class="col-md-4">
                                {{Form::label("", "Gender")}}
                                <span class="text-danger">*</span>
                                <select name="gender" class="form-control">
                                    <option value="{{$student->gender}}" hidden selected>{{$student->gender}}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                     </div>
 
                     <div class="row">
                        <div class="col-md-4">
                            {{Form::label("", "Birthplace")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="birthplace" value="{{$student->birthplace}}">
                        </div>
                        <div class="col-md-4">
                            {{Form::label("", "Birthdate")}}
                            <span class="text-danger">*</span>
                            <input type="date" class="form-control" name="birthdate" id="edit_student_birthdate"   value="{{$student->birthdate}}">
                            <div class="agehere" style="margin-top: 8px;"></div>
                        </div>
                         <div class="col-md-4">
                             {{Form::label("", "Address")}}
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="address" value="{{$student->address}}">
                         </div>
                     </div>
                     
                     {{ Form::hidden('_method', 'PUT') }}  
                     <div class="row" style="margin-top: 20px;">
                         <div class="col-md-12">
                             <button class="btn btn-primary"type="submit">update student</button>
                         </div>
                     </div>
                 {!! Form::close() !!}  
         </div>
         </div>
     </div>
 </div>




