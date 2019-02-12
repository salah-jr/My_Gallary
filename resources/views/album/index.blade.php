@extends('layouts.app')
@section('content')
    <h1>Albums</h1>
    @if (count($albums)>0)
        <div class="row">
        @foreach ($albums as $album)
            <div class="col-lg-4 col-md-6 col-sm-1">
                <div class="card" style="width: 18rem; height: 20rem;">
                     <img class="card-img-top" style="width: 18rem; height: 10rem;" src="storage/storage/album_covers/{{$album->cover_image}}" alt="Album image">
                    <div class="card-body">
                        <h5 class="card-title">{{$album->name}}</h5>
                        <p class="card-text">{{$album->description}}</p>
                        <a href="/albums/{{$album->id}}" class="btn btn-primary">See Album</a>
                    </div>
                </div>
                <br>
            </div>
           
        @endforeach
    </div>
    @else
        <p>There is no albums</p>    
    @endif


@endsection