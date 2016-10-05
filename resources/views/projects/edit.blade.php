@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('projects') }}">{{trans('strings.projects')}}</a> / {{ $project->name }}</p>

{!! Form::open(array('route' => array('projects.update', $project->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Category', trans('strings.category')) !!}
  {!! Form::select('category_id', $categories, $project->category_id, ['class' => 'form-control']) !!}

  <br>

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $project->name, ['class' => 'form-control']) !!}

  {!! Form::label('Company', trans('strings.company')) !!}
  {!! Form::text('company', $project->company, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', $project->url, ['class' => 'form-control']) !!}

  {!! Form::label('Start', trans('strings.date')) !!}
  {!! Form::date('start', $project->start, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.date')) !!}
  {!! Form::date('end', $project->end, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Complete', trans('strings.complete')) !!}
  {!! Form::hidden('complete', false) !!}
  {!! Form::checkbox('complete', true, $project->complete) !!}

  <br>

  {{ Form::submit('Update', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
