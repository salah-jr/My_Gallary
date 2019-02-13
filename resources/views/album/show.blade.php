@extends('layouts.app')
@section('content')
    <br>
    <h1>{{$album->name}}</h1>
    <a href="/" class="btn btn-secondary">Go Back</a>
    <a href="/photos/create/{{$album->id}}" class="btn btn-success">Upload image to album</a>
    <hr>
    @if (count($album->images)>0)
        <div class="row">
            @foreach ($album->images as $image)
                <div class="col-lg-4 col-md-6 col-sm-1">
                    <a href="/photos/{{$image->id}}">
                        <img class="img-thumbnail" src="/storage/photos/{{$image->album_id}}/{{$image->photo}}" alt="{{$image->title}}"> 
                    </a>
                </div>
            
            @endforeach
        </div>
    @else
        <p>There is no Photos</p>    
    @endif
@endsection