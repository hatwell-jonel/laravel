@extends('layouts.student')

@section('content_header') 
    <h1>Profile</h1>
@endsection



<style>
    .profile{
        background-color: #fff;
        margin: auto;
        width: 500px;
        padding: 1rem;
        border-radius: 5px;
        box-shadow: 1px 8px 12px rgba(0, 0, 0, .2);
    }

    .profile_body{
        padding: 1rem 0rem;
        margin-top: 1rem;
        border-top: 1px solid black;
    }

    .profile_header-text{
        text-align: center;
    }

    .profile_header-text h1{
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: bold;
        margin: 0
    }

    .profile_header-text span{
        font-size: 1.5rem;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .auth_data{
        font-size: 1.7rem;
        font-weight: bold; 
        margin: 1rem 0rem;

    }

    .auth_data .data_value{
        font-weight: normal ; 
        font-size: 2rem;
    }

    .profile_header-image{
        display: flex;
        align-content: center;
        padding: 1rem 0rem;
    }

    .profile_header-image img{
        width: 150px;
        height: 150px;
        margin: auto;
        border-radius: 50%;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .avatar-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .avatar-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: "FontAwesome";
        color: #757575;
        position: absolute;
        top: 10px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

</style>

@section('content')
    <div class="container">

        <div class="profile">
            <div class="profile_header">

                <div class="profile_header-image">
                    <div class="container">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="profile_header-text">
                    <h1>{{ Auth::user()->name }}</h1>
                    <span> {{ Auth::user()->account_id }}</span>
                </div>
            </div>
            <div class="profile_body">
                <div class="row">
                    <div class="col-md-12 auth_data">
                        Email: <span class="data_value"> {{ Auth::user()->email }}</span>
                    </div>
                    <div class="col-md-12 auth_data">
                        Contact: <span class="data_value"> {{ Auth::user()->contact }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 auth_data">
                        Gender: <span class="data_value"> {{ Auth::user()->gender }}</span>
                    </div>
                    <div class="col-md-12 auth_data">
                        Birthdate:  <span class="data_value">{{ date('M d, Y', strtotime(Auth::user()->birthdate))  }}</span> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 auth_data">
                        Birthplace:  <span class="data_value">{{ Auth::user()->birthplace }}</span> 
                    </div>
                    <div class="col-md-12 auth_data">
                        Address: <span class="data_value"> {{ Auth::user()->address }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection


