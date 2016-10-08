@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>{{trans('strings.edit')}}</h1>

    <p><a href="{{ url('categories') }}">{{trans('strings.categories')}}</a> / {{ $category->name }}</p>

    {!! Form::open(array('route' => array('categories.update', $category->id), 'files' => true, 'method' => 'PATCH')) !!}

    {!! Form::label('Name', trans('strings.name')) !!}
    {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}

    {!! Form::label('Photo', trans('strings.image')) !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}

    <br>

    {{ Form::submit('Update', array('class' => 'btn btn-success')) }}

    {!! Form::close() !!}

  </div>

@stop
