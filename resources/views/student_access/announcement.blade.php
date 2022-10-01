@extends('layouts.student')

@section('content_header') 
    <h1>Announcement</h1>
@endsection



<style>
    .announcement_wrapper{
        padding: 1rem;
        background: white;
    }

    .announcement{
        background: #FFFFB5;
        height: 600px;
        margin: 10px;
    }

    .announcement:nth-child(even){
        background: #FFAEA5;
    }

    .announcement_header{
        position: relative;
        height: 40% !important;
    }

    .announcement_body{
        height: 53% !important;
    }

    .announcement_body .announcement_title{
        text-transform: uppercase !important;
        word-wrap: break-word;
        margin: 0;
        height: 10% !important;
        max-width: 100%;
        margin-top: 5px;
        overflow: scroll;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .announcement_body .announcement_title::-webkit-scrollbar {
        display: none;
    }

    .announcement_body .announcement_details{
        overflow: scroll;
        word-wrap: break-word;
        margin-top: 5px;
        height: 75% !important;
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .announcement_body .announcement_details::-webkit-scrollbar{
        display: none;
    }

    .announcement_footer{
        height: 6% !important;
    }

    .student_announcement_image{
        object-fit: fill;
        margin: auto;
    }

</style>

@section('content')
    <div class="container">
        @if (count($announcements) >= 1)
            <div class="announcement_wrapper row">
                    @foreach ($announcements as $announcement)
                        <div class="announcement col-md-5">
                            <div class="announcement_header">
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
                                    <div class="carousel-inner" style="height: 100%; width: 100%;">
                                        @foreach($images as $image) 
                                            <div class="item {{ $loop->first  ? 'active' : '' }}">
                                                <img src="{{ URL::to($image) }}" class="student_announcement_image" style="display: block; max-width:100%; max-height: 300px;" alt="images"> 
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            
                                {{-- @foreach($images as $image)
                                    <img src="{{ URL::to($image) }}" style="display: block; width:100%; max-height: 300px;" alt="images"> 
                                @endforeach --}}
                                {{-- ===================== OK FOR MULTIPLE IMAGES ===================================================== --}}
                            </div>
                            <div class="announcement_body">
                                <h2 class="announcement_title">{{ $announcement->title}}</h2>
                                <p class="announcement_details">
                                    {{ $announcement->detail}}
                                </p>
                            </div>
                            <div class="announcement_footer">
                                <p>
                                    Date: {{ date('M d, Y', strtotime($announcement->start_date))}} - {{ date('M d, Y', strtotime($announcement->end_date))}}
                                </p>
                            </div>
                        </div>
                    @endforeach
            </div>
            @else
                <h3><i>No Announcements</i></h3>
        @endif
    </div>
@endsection