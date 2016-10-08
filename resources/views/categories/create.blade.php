@extends('layouts.app')

@section('content')
  <div class="container">
    {!! Form::open(['route' => 'categories.store', 'files' => true, 'method' => 'POST']) !!}

    {!! Form::label('Name', trans('strings.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('Photo', trans('strings.image')) !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}

    {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

    {!! Form::close() !!}
  </div>
@stop
