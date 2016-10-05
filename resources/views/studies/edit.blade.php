@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('studies') }}">{{trans('strings.studies')}}</a> / {{ $study->name }}</p>

{!! Form::open(array('route' => array('studies.update', $study->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Category', trans('strings.category')) !!}
  {!! Form::select('category_id', $categories, $study->category_id, ['class' => 'form-control']) !!}

  <br>

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $study->name, ['class' => 'form-control']) !!}

  {!! Form::label('Company', trans('strings.company')) !!}
  {!! Form::text('company', $study->company, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', $study->url, ['class' => 'form-control']) !!}

  {!! Form::label('Start', trans('strings.date')) !!}
  {!! Form::date('start', $study->start, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.date')) !!}
  {!! Form::date('end', $study->end, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Complete', trans('strings.complete')) !!}
  {!! Form::hidden('complete', false) !!}
  {!! Form::checkbox('complete', true, $study->complete) !!}

  <br>

  {{ Form::submit('Update', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
