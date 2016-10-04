@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('courses') }}">{{trans('strings.courses')}}</a> / {{ $course->name }}</p>

{!! Form::open(array('route' => array('courses.update', $course->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Category', trans('strings.category')) !!}
  {!! Form::select('category_id', $categories, $course->category_id, ['class' => 'form-control']) !!}

  <br>

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $course->name, ['class' => 'form-control']) !!}

  {!! Form::label('Company', trans('strings.company')) !!}
  {!! Form::text('company', $course->company, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', $course->url, ['class' => 'form-control']) !!}

  {!! Form::label('Start', trans('strings.date')) !!}
  {!! Form::date('start', $course->start, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.date')) !!}
  {!! Form::date('end', $course->end, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Complete', trans('strings.complete')) !!}
  {!! Form::checkbox('complete', 1, true, ['class' => 'field']) !!}

  <br>

  {{ Form::submit('Update', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
