{{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-showAnnouncement{{$announcement->id}}" data-tooltip="view">
    <i class="fa fa-eye"></i>
 </button>
 
  --}}
<div class="modal fade" id="modal-showAnnouncement{{$announcement->id}}">
     <div class="modal-dialog  modal-xl" style="min-width: 700px;">
         <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h1 style="padding: 0; margin:0;">ANNOUNCEMENT!!!</h1>
            </div>
            <div class="modal-body ">
                
                <section class="img_section" style="width: 100%; margin-inline: auto;">

                    {{-- ===================== OK FOR MULTIPLE IMAGES ===================================================== --}}
                    @php
                        $image = DB::table('announcement')->where('id', $announcement->id)->first();
                        $images = explode('|', $image->image); 
                    @endphp

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach( $images as $image) 
                                <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                    
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @foreach($images as $image) 
                                <div class="item {{ $loop->first  ? 'active' : '' }}">
                                    <img src="{{ URL::to($image) }}" style="display: block; width:100%; max-height: 300px;" alt="images"> 
                                </div>
                            @endforeach
                        </div>
                    
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>
                    
                        {{-- @foreach($images as $image)
                            <img src="{{ URL::to($image) }}" style="display: block; width:100%; max-height: 300px;" alt="images"> 
                        @endforeach --}}
                    {{-- ===================== OK FOR MULTIPLE IMAGES ===================================================== --}}


                    {{-- ============ OK FOR SINGLE UPLOAD IMAGE ===============================--}}
                    {{-- <img src="{{ asset('images/' . $announcement->image) }}" style="display: block; width:100%; max-height: 300px;" alt="images"> --}}
                    {{-- ============ OK FOR SINGLE UPLOAD IMAGE ===============================--}}

                </section>
                
                <section style="width:100%; word-wrap:break-word;">
                    <h3 style="padding: 0; margin:0;" class="text-capitalize text-center">{{$announcement->title}}</h3>
                    <p class="lead text-left" style="margin-top: 12px; font-size:1.5rem;"> {!! $announcement->detail !!}</p>
                </section>
            </div>
         </div>
     </div>
 </div>