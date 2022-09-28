@extends('layouts.StudentAccess')


<style>
  img{
    max-width: 100%;
  }

  .masonry{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin: 70px 0px 20px;
  }

  .announcement{
    border-radius: 10px;
    width: 500px;
    margin: auto;
    background: white;
    box-shadow: 1px 5px 5px rgba(0,0,0,.3);
  }


  .announcement_header{
    padding: 1rem;
  }

  .announcement_detail{
    overflow: scroll;
    padding: 1rem;
    max-height: 300px;
  }

  .announcement_detail::-webkit-scrollbar{
    display: none;
  }

  .carousel_img{
    width: 100%;
    max-width: 100%;
    height: 500px !important;
  }

  .announcement_footer{
    padding: 1rem ;
  }

</style>

@section('content_header')
    <section class="content-header">
        <h1>Announcement</h1>
    </section>
@endsection

@section('content')

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      @foreach($announcements as $announcement)
        <div class="item {{$announcement->id == 1 ? 'active' : ''}}">
            <img class="carousel_img" src="{{asset('images/' . $announcement->image)}}" alt="announcement photo">
          <div class="carousel-caption">
            <h3>{{$announcement->title}}</h3>
          </div>
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
    @if(count($announcements) >= 1)
    <div class="masonry">                                                                               
      @foreach($announcements as $announcement)
        <div class="announcement">
          <div class="announcement_header">
            <h2>{{$announcement->title}}</h2>
          </div>
          <img class="announcement_image" src="{{asset('images/' . $announcement->image)}}" alt="announcement photo">
          <div class="announcement_detail">
            <p>{{$announcement->detail}}</p>
          </div>
          <div class="announcement_footer">
            <span>Posted: {{ date('M d, Y', strtotime($announcement->start_date))}}</span>
            <p>Until: {{ date('M d, Y', strtotime($announcement->end_date))}}</p>
          </div>
        </div>
      @endforeach
    </div>
      @else
    @endif
@endsection