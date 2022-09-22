@extends('access_admin.announcement')

@section('content_header')   
    <section class="content-header">
        <h1 class="text-capitalize">announcement</h1>
    </section>
@endsection


@section('admin_announcement')
    <h1>Hello</h1>

    <div class="container-fluid">
        @include('modal.addAnnouncement')
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Date Created</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($announcements) >= 1)
                @foreach($announcements as $announcement)
                    <tr>
                        <th scope="row">{{$announcement->id}}</th>
                        <td>{{$announcement->title}}</td>
                        <td>{{$announcement->detail}}</td>
                        {{-- <td><img class="imagedone" width=50% height=50% src="{{ asset('storage/app/images'.$announcement->image)}}" alt="image"></td> --}}
                        <td>{{date('M d, Y' , strtotime($announcement->created_at))}}</td>
                    </tr>
                @endforeach
                 
                    @else
                    <p>No data found</p>
                @endif
            </tbody>
          </table>
    </div>

@endsection

@section('script')  
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection