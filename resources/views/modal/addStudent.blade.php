{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addStudent" data-tooltip="add">
   <i class="fa fa-plus-square"></i> Student
</button> --}}
{{-- 
<style>
    .error{
        display: none;
        color: red;
    }
</style> --}}

        <div class="modal fade" id="modal-addStudent">
            <div class="modal-dialog" style="min-width: 900px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add new Student</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('store.student')}}" method="post" >
                            @csrf 
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="student_firstname">Firstname</label>
                                    <input type="text" class="form-control" name="student_firstname" id="student_firstname" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="student_middlename">Middlename</label>
                                    <input type="text" class="form-control" name="student_middlename" id="student_middlename" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="student_lastname">Lastname</label>
                                    <input type="text" class="form-control" name="student_lastname" id="student_lastname" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" name="student_contact" id="student_contact" maxlength="11" onkeypress=" return isNumber(event)" required>
                                </div>
            
                                <div class="col-md-4">
                                    <label for="student_email">Email</label>
                                    <input type="email" name="student_email" class="form-control" id="student_email" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="student_gender">Gender</label>
                                    <select name="student_gender" class="form-control" id="student_gender" required>
                                        <option value="" hidden selected>Select</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="student_birthplace">Birthplace</label>
                                    <input type="text" class="form-control" name="student_birthplace" id="student_birthplace" required> 
                                </div>
            
                                <div class="col-md-4">
                                    <label for="student_birthdate">Birthdate</label>
                                    <input type="date" class="form-control" name="student_birthdate" id="student_birthdate" required>
                                    <div class="agehere" style="margin-top: 8px;"></div>
                                </div>

                                <div class="col-md-4">
                                    <label for="student_address">Address</label>
                                    <input type="text" class="form-control" id="student_address" name="student_address" required    >
                                </div>
                            </div>

                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn_add_student text-uppercase" style="width: 100%;" type="submit">add student</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>  
                </div>
            </div>
        </div>


    {{-- <div class="modal fade" id="modal-addStudent">
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

            </div>
        </div>
    </div> --}}


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

        // $("#add_student_form").on('submit', function(e){
        //         console.log("not working");
        //         e.preventDefault();
        //         $.ajax({
        //             url:$(this).attr('action'),
        //             method:$(this).attr('method'),
        //             data: new FormData(this),
        //             processData:false,
        //             dataType: 'json',
        //             contentType: false,
        //             beforeSend:function(){
        //                 $(document).find('span.validation_error').text('');
        //             },
        //             success:function(data){ 
        //                 if(data.status == 0){
        //                     console.log(data);
        //                     $.each(data.error, function(prefix, val){
        //                         $('span.'prefix+'_error').text(val[0]);
        //                     })
        //                 }else{
        //                     $("#add_student_form")[0].reset();
        //                     alert(data.msg);
        //                 }

        //             }
        //         });
        //     });
  
    </script>