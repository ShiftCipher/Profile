@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'projects.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Category', trans('strings.category')) !!}
  {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Company', trans('strings.company')) !!}
  {!! Form::text('company', null, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', null, ['class' => 'form-control']) !!}

  {!! Form::label('Start', trans('strings.date')) !!}
  {!! Form::date('start', null, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.date')) !!}
  {!! Form::date('end', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Complete', trans('strings.complete')) !!}
  {!! Form::hidden('complete', false) !!}
  {!! Form::checkbox('complete', true) !!}

  <br>

  {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
