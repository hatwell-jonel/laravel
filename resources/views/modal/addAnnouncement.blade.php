<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-announcement" data-tooltip="add">
    <i class="fa fa-plus-square"></i> Announcement
 </button>
 
 <div class="modal fade" id="modal-announcement">
    <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add new Admin</h4>
        </div>
        <div class="modal-body">
                {!! Form::open(["action" => "AnnouncementController@store", "method" => "POST" , "class" => "addForm border border-danger", "enctype" => "multipart/form-data" ]) !!}
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            {{Form::label("", "Title")}}
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="announcement_title"required>
                        </div>

                        
                        <div class="col-md-2">
                            {{Form::label("", "start")}}
                            <span class="text-danger">*</span>
                            <input type="date" class="form-control" name="announcement_start" required>
                        </div>

                        <div class="col-md-2">
                            {{Form::label("", "Until")}}
                            <span class="text-danger">*</span>
                            <input type="date" class="form-control" name="announcement_end" required>
                        </div>

                        <div class="form-group col-md-4">
                            {{Form::label("", "Upload image")}}
                            <input type="file" class="form-control" name="announcement_image" accept="image/*" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            {{Form::label("", "Details")}}
                            <span class="text-danger">*</span>
                            <textarea name="announcement_detail" id="editor" class="form-control" style="resize: false;" required></textarea>
                        </div>
                    </div>
             
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <button class="btn btn-primary"type="submit">add</button>
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