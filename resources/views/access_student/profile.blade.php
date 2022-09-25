@extends('layouts.StudentAccess')

<style>
    img{
        display: block;
    }

    h1,h2{
        margin: 0;
        padding: 0;
    }
    #profile{
        background-color: white;
        padding: 2rem 1.5rem;
        border-radius: 10px;
        box-shadow: 1px 10px 10px rgba(0, 0, 0, 0.2);
    }

 
    .profile_header{
        border-bottom: 2px solid rgba(0, 0, 0, 0.5);
    }

    .profile_header-name{
        text-align: center;
    }


    .profile_header-name h1{
        font-size:2.4rem;
        margin-bottom: 0 !important;
    }

    .profile_body{
        padding: 1rem 0rem;
    }

    .profile_body .info{
        font-size: 1.4rem;
    }


    .profile_image_container{
        position: relative;
        width: 120px;
        height: 120px;
        overflow: hidden;
    }


    .profile_image_container .profile_header-img{
        width: 100%;
        height: 100%;
        border-radius: 50%;
        margin: auto;
        border: 2px solid black;
    }

    .profile_image_container input{
        position: absolute;
        top: 0;
        border: 1px solid red;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .profile_image_container input:hover{
        background-color: rgba(0, 0, 0, 0.5);
    }

    .profile_image_container input::before{
        content: 'change';
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%,-50%);
        visibility: hidden;

    }


    .profile_image_container .input input::-webkit-file-upload-button{
    visibility: hidden;
    }
</style>


@section('header_content')
    <div class="content-header">
        <h1>Profile</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6" id="profile">
            <div class="profile_header">
                <div class="profile_image_container">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Emoji_u1f196.svg/1200px-Emoji_u1f196.svg.png" class="profile_header-img" alt="">
                    
                </div>
                {!! Form::open(["action" => "StudentAccessController@storeImage", "method" => "POST" , "class" => "input"]) !!}
                    @csrf
                    <label for="">Image</label>
                    <input type="file" name="profile_image">
                    <button type="submit">change</button>
                {!! Form::close() !!}  

                <div class="profile_header-name">
                    <h1>
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="">
                        {{ Auth::user()->account_id }}
                    </p>
                </div>
            </div>
            <div class="profile_body">
                <div class="row">
                    <p class="col-md-6 info">Contact:  {{ Auth::user()->contact }}</p>
                    <p class="col-md-6 info">Email:  {{ Auth::user()->email }}</p>
                </div>
                <div class="row">
                    <p class="col-md-6 info">Address:  {{ Auth::user()->address }}</p>
                    <p class="col-md-6 info">Gender:  {{ Auth::user()->gender }}</p>
                </div>
                <div class="row">
                    <p class="col-md-6 info">Birthplace:  {{ Auth::user()->birthplace }}</p>
                    <p class="col-md-6 info">Birthdate: {{ date('M d, Y', strtotime(Auth::user()->birthdate))  }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection