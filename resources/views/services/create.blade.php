@extends('layouts.app')

@section('content')

  <div class="container">

    {!! Form::open(['route' => 'services.store', 'files' => true, 'method' => 'POST']) !!}


    {!! Form::label('Name', trans('strings.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}


    {!! Form::label('URL', trans('strings.url')) !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}


    {!! Form::label('Icon', trans('strings.icon')) !!}
    {!! Form::text('icon', null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

    {!! Form::close() !!}

  </div>

@stop
