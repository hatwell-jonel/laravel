<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-addAdmin">
    <i class="fa fa-plus-square"></i> Admin
 </button>
 
 
 <div class="modal fade" id="modal-addAdmin">
     <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
         <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">Add new Admin</h4>
         </div>
         <div class="modal-body">
                 {!! Form::open(["action" => "AdminController@store", "method" => "POST" , "class" => "addForm border border-danger"]) !!}
                     @csrf
                     <div class="row">
                         <div class="form-group col-md-4">
                             {{Form::label("", "Firstname")}}
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="admin_firstname">
                         </div>
                         <div class="form-group col-md-4">
                             {{Form::label("", "Middlename")}}
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="admin_middlename">
                         </div>
                         <div class="form-group col-md-4">
                             {{Form::label("", "Lastname")}}
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="admin_lastname">
                         </div>
 
                     </div>
                     
                     <div class="row">
                         <div class="col-md-4">
                             {{Form::label("", "Contact")}}
                             <span class="text-danger">*</span>
                             <input type="number" class="form-control" name="admin_contact" >
                         </div>
                    
     
                         <div class="col-md-4">
                             {{Form::label("", "Email")}}
                             <span class="text-danger">*</span>
                             <input type="email"  class="form-control" name="admin_email" placeholder="Autogenerate (id@email.com)" disabled>
                         </div>
 
                         <div class="col-md-4">
                             {{Form::label("", "Gender")}}
                             <span class="text-danger">*</span>
                             <select name="admin_gender" class="form-control">
                                 <option value="" hidden selected>Select</option>
                                 <option value="male">Male</option>
                                 <option value="female">Female</option>
                             </select>
                         </div>
 
                         
                     </div>
                     
                     <div class="row">
                         <div class="col-md-4">
                             {{Form::label("", "Birthplace")}}
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="admin_birthplace">
                         </div>
     
     
                         <div class="col-md-4">
                             {{Form::label("", "Birthdate")}}
                             <span class="text-danger">*</span>
                             <input type="date" class="form-control" name="admin_birthdate">
                         </div>
 
                         <div class="col-md-4">
                             {{Form::label("", "Address")}}
                             <span class="text-danger">*</span>
                             <input type="text" class="form-control" name="admin_address">
                         </div>
                     </div>
                     
                     <div class="row" style="margin-top: 20px;">
                         <div class="col-md-12">
                             <button class="btn btn-primary"type="submit">add admin</button>
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