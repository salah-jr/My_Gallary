@extends('layouts.app')
@section('content')
    
<br>
    <h3>Create Album</h3>
    {!! Form::open(['action' => 'AlbumController@store', 'method'=> 'post', 'enctype' => 'multipart/form-data']) !!}

        {{ Form::bsText('name') }}
        {{ Form::bsTextArea('description') }}
        {{ Form::bsFile('cover_image') }}
        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
  
    {!! Form::close() !!}
    
@endsection