<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-showAnnouncement{{$announcement->id}}">
    <i class="fa fa-eye"></i>
 </button>
 
 
<div class="modal fade" id="modal-showAnnouncement{{$announcement->id}}">
     <div class="modal-dialog  modal-xl" style="min-width: 700px;">
         <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
             <h1 style="padding: 0; margin:0;"">ANNOUNCEMENT!!!</h1>
         </div>
         <div class="modal-body ">
             
             <section class="img_section" style="width: 100%; margin-inline: auto; border: 1px solid red;">
                <img src="{{asset('images/'.$announcement->image)}}" style="display: block; width:100%; max-height: 300px;" alt="image">
            </section>
            <h3 style="padding: 0; margin:0;" class="text-capitalize text-center">{{$announcement->title}}</h3>
            <p class="lead text-left"> {!! $announcement->detail !!}</p>
         </div>
         <!-- <div class="modal-footer">
             <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary">Save changes</button>
         </div> -->
         </div>
     </div>
 </div>