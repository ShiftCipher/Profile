@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('clients') }}">{{trans('strings.clients')}}</a> / {{ $client->name }}</p>

{!! Form::open(array('route' => array('clients.update', $client->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $client->name, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone', trans('strings.telephone')) !!}
  {!! Form::text('telephone', $client->telephone, ['class' => 'form-control']) !!}

  {!! Form::label('Cellphone', trans('strings.cellphone')) !!}
  {!! Form::text('cellphone', $client->cellphone, ['class' => 'form-control']) !!}

  {!! Form::label('Address', trans('strings.address')) !!}
  {!! Form::text('address', $client->address, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', $client->url, ['class' => 'form-control']) !!}

  {!! Form::label('Start', trans('strings.date')) !!}
  {!! Form::date('start', $client->start, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.date')) !!}
  {!! Form::date('end', $client->end, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

@stop
