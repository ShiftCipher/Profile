@extends('layouts.app')

@section('content')

<div class="container">
{!! Form::open(['route' => 'certificates.store', 'files' => true, 'method' => 'POST']) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}

  {!! Form::label('Company', trans('strings.company')) !!}
  {!! Form::text('company', null, ['class' => 'form-control']) !!}

  {!! Form::label('Code', trans('strings.code')) !!}
  {!! Form::text('code', null, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', null, ['class' => 'form-control']) !!}

  {!! Form::label('Date', trans('strings.date')) !!}
  {!! Form::date('date', null, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Create', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

</div>

@stop
