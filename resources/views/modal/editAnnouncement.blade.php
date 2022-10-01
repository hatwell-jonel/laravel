{{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-editAnnouncement{{$announcement->id}}" data-tooltip="edit">
    <i class="fa fa-edit"></i>
 </button> --}}

 <div class="modal fade" id="modal-editAnnouncement{{$announcement->id}}">
    <div class="modal-dialog  modal-xl" style="min-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Annoucement:{{$announcement->title}}</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('update.announcement', $announcement->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4" style="display:flex; flex-direction:column;">
                            <label for="announcement_update_title">Title</label>
                            <input type="text" value="{{$announcement->title}}" class="form-control" name="announcement_update_title" id="announcement_update_title">
                        </div>

                        <div class="col-md-2" style="display:flex; flex-direction:column;">
                            <label for="announcement_update_start">Start date</label>
                            <input type="date" value="{{$announcement->start_date}}" class="form-control" name="announcement_update_start" id="announcement_update_start">
                        </div>

                        <div class="col-md-2" style="display:flex; flex-direction:column;">
                            <label for="announcement_update_end">End date</label>
                            <input type="date" value="{{$announcement->end_date}}" class="form-control" name="announcement_update_end" id="announcement_update_end">
                        </div>

                        <div class="col-md-4" style="display:flex; flex-direction:column;">
                            <label for="announcement_update_image">Image</label>
                            <input type="file" class="form-control" value="{{$announcement->image}}" name="announcement_update_image[]" id="announcement_update_image" multiple  accept="image/*" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="display:flex; flex-direction:column;">
                            <label for="update_editor">Details</label>
                            <textarea name="announcement_update_detail" id="update_editor" class="form-control" style="resize: false;">
                                {!! $announcement->detail !!}
                            </textarea>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                                <button class="btn btn-primary" style="width: 100%;"  type="submit">Update</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 