@extends('layouts.StudentAccess')

<style>
    img{
        display: block;
    }
    #profile{
        background-color: white;
        padding: 2rem 1.5rem;
        border-radius: 10px;
        box-shadow: 1px 10px 10px rgba(0, 0, 0, 0.2);
    }

    .profile_header-img{
        width: 120px;
        border-radius: 50%;
        margin: auto;
        border: 2px solid black;
    }

    .profile_header-name{
        text-align: center;
        font-size:2.4rem;
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
                <div class="">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Emoji_u1f196.svg/1200px-Emoji_u1f196.svg.png" class="profile_header-img" alt="">
                </div>
                <h1 class="profile_header-name">
                    {{ Auth::user()->name }}
                </h1>
            </div>
            <div class="profile_body">

            </div>
            <div class="profile_footer">

            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection