@extends('layouts.app')

@section('content')
    <a href="/students" class="btn btn-primary">Back</a>
    <h1>{{$student->student_id}}</h1>
    <h1>{{$student->name}}</h1>
    <h1>{{$student->contact}}</h1>
@endsection
