
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
                                <input type="text" class="form-control" name="student_firstname" id="student_firstname" minlength="2"  pattern="[^()/<>[\]\\,'|\x22]+"  onkeydown="preventNumbers(event)"  />
                            </div>
                            <div class="col-md-4">
                                <label for="student_middlename">Middlename</label>
                                <input type="text" class="form-control" name="student_middlename" id="student_middlename" minlength="2"  pattern="[^()/<>[\]\\,'|\x22]+"  onkeydown="preventNumbers(event)"  />
                            </div>
                            <div class="col-md-4">
                                <label for="student_lastname">Lastname</label>
                                <input type="text" class="form-control" name="student_lastname" id="student_lastname" minlength="2"  pattern="[^()/<>[\]\\,'|\x22]+"  onkeydown="preventNumbers(event)"  />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" name="student_contact" id="student_contact" maxlength="11" onkeypress=" return isNumber(event)"  />
                            </div>
        
                            <div class="col-md-4">
                                <label for="student_email">Email</label>
                                <input type="email" name="student_email" class="form-control" id="student_email"  />
                            </div>

                            <div class="col-md-4">
                                <label for="student_gender">Gender</label>
                                <select name="student_gender" class="form-control" id="student_gender" >
                                    <option value="" hidden selected>Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="student_birthplace">Birthplace</label>
                                <input type="text" class="form-control" name="student_birthplace" id="student_birthplace"  /> 
                            </div>
        
                            <div class="col-md-4">
                                <label for="student_birthdate">Birthdate</label>
                                <input type="date" class="form-control" name="student_birthdate" id="student_birthdate"  />
                                <div class="agehere" style="margin-top: 8px;"></div>
                            </div>

                            <div class="col-md-4">
                                <label for="student_address">Address</label>
                                <input type="text" class="form-control" id="student_address" name="student_address"  />
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


<script defer>
    let studentBirthdate = document.querySelector("#student_birthdate");

    function maxDate(element){
        const date = new Date();
        date.setYear(date.getFullYear() - 18);
        element.max = date.toISOString().split("T")[0]; //this simply converts it to the correct format
        element.value = date.toISOString().split("T")[0];
    }

    maxDate(studentBirthdate);
</script>