@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('skills') }}">{{trans('strings.skills')}}</a> / {{ $skill->name }}</p>

{!! Form::open(array('route' => array('skills.update', $skill->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $skill->name, ['class' => 'form-control']) !!}

  {!! Form::label('Level', trans('strings.level')) !!}
  {!! Form::number('level', $skill->level, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
