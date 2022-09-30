@extends("layouts.admin")

@section('content_header') 
    <h1>Announcement</h1>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-announcement" data-tooltip="add">
                <i class="fa fa-plus-square"></i> Announcement
             </button>
             @include("modal.addAnnouncement")
        </div>

        <div class="table-responsive" style="margin-top: 30px; background:white; padding:1rem;">
            <table class="table table-bordered table-striped table-condensed" id="adminsTable">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">start date</th>
                        <th scope="col">end date</th>
                        <th scope="col" style="word-wrap: break-word;
                        width: 700px;">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($announcements as $announcement)
                        <tr>
                            <th scope="row">{{$announcement->id}}</th>
                            <td>{{$announcement->title}}</td>
                            <td>{{ date('M d, Y', strtotime($announcement->start_date)) }}</td>
                            <td>{{  date('M d, Y', strtotime($announcement->end_date))}}</td>
                            <td style="overflow: scroll !important;">{!! $announcement->detail !!}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-showAnnouncement{{$announcement->id}}" data-tooltip="view">
                                    <i class="fa fa-eye"></i>
                                 </button>
                                 @include('modal.showAnnouncement')
                             
                                 
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-editAnnouncement{{$announcement->id}}" data-tooltip="edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                @include('modal.editAnnouncement')


                                <a class="btn btn-danger" href="{{url('/admin_access/announcement/'. $announcement->id)}}" data-tooltip="delete"> <i class="fa  fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection