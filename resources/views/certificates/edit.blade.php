@extends('layouts.app')

@section('content')

<div class="container">
<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('certificates') }}">{{trans('strings.certificates')}}</a> / {{ $certificate->name }}</p>

{!! Form::open(array('route' => array('certificates.update', $certificate->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $certificate->name, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {!! Form::label('Company', trans('strings.company')) !!}
  {!! Form::text('company', $certificate->company, ['class' => 'form-control']) !!}

  {!! Form::label('Code', trans('strings.code')) !!}
  {!! Form::text('code', $certificate->code, ['class' => 'form-control']) !!}

  {!! Form::label('URL', trans('strings.url')) !!}
  {!! Form::text('url', $certificate->url, ['class' => 'form-control']) !!}

  {!! Form::label('Date', trans('strings.date')) !!}
  {!! Form::date('date', $certificate->date, ['class' => 'form-control']) !!}

  <br>

  {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

{!! Form::close() !!}

</div>

@stop
