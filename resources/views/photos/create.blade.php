@extends('layouts.app')
@section('content')
    
<br>
    <h3>Create Photo</h3>
    {!! Form::open(['action' => 'PhotosController@store', 'method'=> 'post', 'enctype' => 'multipart/form-data']) !!}

        {{ Form::bsText('title') }}
        {{ Form::bsTextArea('description') }}
        {{ Form::bsFile('photo') }}
        {{Form::hidden('album_id', $album_id)}}
        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
  
    {!! Form::close() !!}
    
@endsection