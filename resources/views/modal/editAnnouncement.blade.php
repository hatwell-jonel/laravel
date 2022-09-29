<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-editAnnouncement{{$announcement->id}}" data-tooltip="edit">
    <i class="fa fa-edit"></i>
 </button>
 
 
<div class="modal fade" id="modal-editAnnouncement{{$announcement->id}}">
     <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
         <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title">Annoucement:{{$announcement->title}}</h4>
         </div>
         <div class="modal-body">
                 {!! Form::open(["action" => ["AnnouncementController@update", $announcement->id], "method" => "POST" , "class" => "addForm border border-danger"]) !!}
                     @csrf
                     <div class="row">
                        <div class="form-group col-md-4">
                            {{Form::label("", "Title")}}
                            <span class="text-danger">*</span>
                            <input type="text" value="{{$announcement->title}}" class="form-control" name="announcement_update_title">
                        </div>

                        <div class="col-md-2">
                            {{Form::label("", "start")}}
                            <span class="text-danger">*</span>
                            <input type="date" value="{{$announcement->start_date}}" class="form-control" name="announcement_update_start" required>
                        </div>

                        
                        <div class="col-md-2">
                            {{Form::label("", "Until")}}
                            <span class="text-danger">*</span>
                            <input type="date" value="{{$announcement->end_date}}" class="form-control" name="announcement_update_end" required>
                        </div>


                        <div class="form-group col-md-6">
                            {{Form::label("", "Upload image")}}
                            <input type="file" class="form-control" name="announcement_update_image" >
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            {{Form::label("", "Details")}}
                            <span class="text-danger">*</span>
                            <textarea name="announcement_update_detail" id="update_editor" class="form-control" style="resize: false;">
                                {!! $announcement->detail !!}
                            </textarea>
                        </div>
                    </div>
             
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            {{ Form::hidden('_method', 'PUT') }}  
                            <button class="btn btn-primary"type="submit">Update</button>
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