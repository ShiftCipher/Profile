@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('languages') }}">{{trans('strings.languages')}}</a> / {{ $language->name }}</p>

{!! Form::open(array('route' => array('languages.update', $language->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $language->name, ['class' => 'form-control']) !!}

  {!! Form::label('Level', trans('strings.level')) !!}
  {!! Form::number('level', $language->level, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
