@extends('access_admin.announcement')

@section('content_header')   
    <section class="content-header">
        <h1 class="text-capitalize">announcement</h1>
    </section>
@endsection


@section('admin_announcement')
    <div class="container-fluid">
        @include('modal.addAnnouncement')
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col" style="word-wrap: break-word;
                width: 700px;">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if(count($announcements) >= 1)
                    @foreach($announcements as $announcement)
                        <tr>
                            <th scope="row">{{$announcement->id}}</th>
                            <td>{{$announcement->title}}</td>
                            <td style="overflow: scroll !important;">{!!    $announcement->detail !!}</td>
                            {{-- <td>
                                <img src="{{asset('images/'.$announcement->image)}}" alt="image">
                            </td> --}}
                            <td>{{date('M d, Y' , strtotime($announcement->created_at))}}</td>
                            <td style="display: flex; gap: 5px">


                                @include('modal.showAnnouncement')
                                @include('modal.editAnnouncement')


                                
                                {{-- <button class="btn btn-info">edit</button> --}}

                                {!! Form::open(['action' => ['AnnouncementController@destroy', $announcement->id], 'method' => 'SUBMIT']) !!}
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    <button class="btn btn-danger" type="submit"> <i class="fa  fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
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
        ClassicEditor
            .create( document.querySelector( '#update_editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection