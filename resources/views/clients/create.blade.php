@extends('layouts.app')

@section('content')

{!! Form::open(['route' => 'clients.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone', trans('strings.telephone')) !!}
  {!! Form::text('telephone', null, ['class' => 'form-control']) !!}

  {!! Form::label('Cellphone', trans('strings.cellphone')) !!}
  {!! Form::text('cellphone', null, ['class' => 'form-control']) !!}

  {!! Form::label('Address', trans('strings.address')) !!}
  {!! Form::text('address', null, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', null, ['class' => 'form-control']) !!}

  {!! Form::label('Start', trans('strings.date')) !!}
  {!! Form::date('start', null, ['class' => 'form-control']) !!}

  {!! Form::label('End', trans('strings.date')) !!}
  {!! Form::date('end', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
