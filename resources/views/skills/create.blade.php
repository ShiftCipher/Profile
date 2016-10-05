@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'skills.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Level', trans('strings.level')) !!}
  {!! Form::number('level', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
