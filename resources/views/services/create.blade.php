@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'services.store', 'files' => true, 'method' => 'POST']) !!}


  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}


  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', null, ['class' => 'form-control']) !!}


  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
