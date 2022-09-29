<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addStudent" data-tooltip="add">
   <i class="fa fa-plus-square"></i> Student
</button>

<style>
    .error{
        display: none;
        color: red;
    }
</style>


<div class="modal fade" id="modal-addStudent">
    <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add new Student</h4>
        </div>
        <div class="modal-body">
                {!! Form::open(["action" => "StudentController@store", "method" => "POST" , "class" => "addForm", "id" => "add_student_form"]) !!}
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            {{Form::label("", "Firstname")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstname" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                            @error('firstname')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            {{Form::label("", "Middlename")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="middlename" id="middlename" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                            <span class="validation_error middlename_error" id="middlename_err"></span>
                        </div>
                        <div class="form-group col-md-4">
                            {{Form::label("", "Lastname")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="lastname" id="lastname" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                            <span class="validation_erro lastname_errorr" id="lastname_err"></span>
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label("", "Contact")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="contact" id="contact" maxlength="11" onkeypress=" return isNumber(event)" required>
                            <span class="validation_error contact_error" id="contact_err"></span>
                        </div>
                   
    
                        <div class="col-md-4">
                            {{Form::label("", "Email")}}
                            <span class="text-danger">*</span>
                            <input type="email" name="email" class="form-control" id="email" required>
                            <span class="validation_error email_error" id="email_err"></span>
                        </div>

                        <div class="col-md-4">
                            {{Form::label("", "Gender")}}
                            <span class="text-danger">*</span>
                            <select name="gender" class="form-control" id="gender" required>
                                <option value="" hidden selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span class="validation_error gender_error" id="gender_err"></span>
                        </div>

                        
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            {{Form::label("", "Birthplace")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="birthplace" id="birthplace" required> 
                            <span class="validation_error birthplace_error" id="birthplace_err"></span>
                        </div>
    
                        <div class="col-md-4">
                            {{Form::label("", "Birthdate")}}
                            <span class="text-danger">*</span>
                            <input type="date" class="form-control" name="birthdate" id="birthdate" onchange="agecalculator()" required>
                            <div class="agehere" style="margin-top: 8px;"></div>
                            <span class="validation_error birthdate_error" id="birthdate_err"></span>
                        </div>

                        <div class="col-md-4">
                            {{Form::label("", "Address")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="address" name="address" required    >
                            <span class="validation_error address_error" id="address_err"></span>
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


    <script defer>
        function agecalculator(){
            var dNow = new Date();

            var birthdate = document.getElementById('birthdate');
            var birthday = new Date(birthdate.value);


            var cmm = dNow.getMonth()+1;
            var cdd = dNow.getDate();
            var cyy = dNow.getFullYear();

            var dd = birthday.getDate()+1;
            var mm = birthday.getMonth()+1;
            var yy = birthday.getFullYear();

            var agebyyear = Math.abs(yy - dNow.getFullYear());

            if((agebyyear > 12 && mm < cmm ) || (agebyyear > 12 && mm == cmm && dd <= cdd))
            {
                $(".agehere").html(agebyyear + " yrs old").css({"color": "green"});
                // $('#birthdate').val(agebyyear);
            }else if((agebyyear > 12 && mm > cmm ) || (agebyyear > 12 && mm == cmm && dd >= cdd)){
                $(".agehere").html(agebyyear - 1 + " years old");
                // $('#birthdate').val(agebyyear - 1);
            }
            else
            {
                $(".agehere").html("Underage").css("color", "red");
            }
        }
  
    </script>