<div class="modal fade" id="modal-addAdmin">
    <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add new Admin</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('store.admin')}}" method="post" id="addStudentForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="admin_firstname">Firstname</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="admin_firstname" id="admin_firstname" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required >
                        </div>
                        <div class="col-md-4">
                            <label for="admin_middlename">Middlename</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="admin_middlename" id="admin_middlename" minlength="2" onkeydown="return /[a-z]/i.test(event.key)" required>
                        </div>
                        <div class="col-md-4">
                            <label for="admin_lastname">Lastname</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="admin_lastname" id="admin_lastname" minlength="2" onkeydown="return /[a-z]/i.test(event.key)"  required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="admin_contact">Contact</label>
                            <span class="text-danger">*</span>
                           <input type="text" class="form-control" name="admin_contact" id="admin_contact"  maxlength="11" onkeypress="return isNumber(event)"  required>
                        </div>
                        <div class="col-md-4">
                            <label for="admin_email">Email</label>
                            <span class="text-danger">*</span>
                            <input type="email"  class="form-control" name="admin_email" id="admin_email" required>
                        </div>

                        <div class="col-md-4">
                            <label for="admin_gender">Gender</label>
                            <span class="text-danger">*</span>
                            <select name="admin_gender" id="admin_gender" class="form-control" required>
                                <option value="" hidden selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="admin_birthplace">Birthplace</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="admin_birthplace" id="admin_birthplace" required />
                        </div>
                        <div class="col-md-4">
                            <label for="admin_birthdate">Birthdate</label>
                            <span class="text-danger">*</span>
                            <input type="date" class="form-control" name="admin_birthdate" id="admin_birthdate"required /> 
                        </div>
                        <div class="col-md-4">
                            <label for="admin_address">Address</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="admin_address" id="admin_address" required />
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <button class="btn btn-primary" style="width: 100%; text-transform:uppercase;" type="submit">add admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script defer>
    
    let adminBirthdate = document.querySelector("#admin_birthdate");

    function maxDate(element){
        const date = new Date();
        date.setYear(date.getFullYear() - 18);
        element.max = date.toISOString().split("T")[0]; //this simply converts it to the correct format
        element.value = date.toISOString().split("T")[0];
    }

    maxDate(adminBirthdate);
</script>
 