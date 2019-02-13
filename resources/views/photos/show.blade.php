@extends('layouts.app')
@section('content')

    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a href="/albums/{{$photo->album_id}}" class="btn btn-secondary">Back to Gallary</a>
    <hr>
    <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" width="500" height="400" alt="{{$photo->title}}">
    <br><br>
    {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method'=> 'POST']) !!}

        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger']) }}
    
    {!! Form::close() !!} 
    <hr>
    <small>Size: {{$photo->size}}</small>
@endsection