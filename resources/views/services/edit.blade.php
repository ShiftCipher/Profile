@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('services') }}">{{trans('strings.services')}}</a> / {{ $service->name }}</p>

{!! Form::open(array('route' => array('services.update', $service->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $service->name, ['class' => 'form-control']) !!}


  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', $service->url, ['class' => 'form-control']) !!}


  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Update', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
