@extends('layouts.app')

@section('content')

<h1>{{trans('strings.edit')}}</h1>

<p><a href="{{ url('users') }}">{{trans('strings.users')}}</a> / {{ $user->name }}</p>

{!! Form::open(array('route' => array('users.update', $user->id), 'files' => true, 'method' => 'PATCH')) !!}

  {!! Form::label('Name', trans('strings.name')) !!}
  {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}

  {!! Form::label('Email', trans('strings.email')) !!}
  {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}

  {!! Form::label('Nickname', trans('strings.nickname')) !!}
  {!! Form::text('nickname', $user->nickname, ['class' => 'form-control']) !!}

  {!! Form::label('Bio', trans('strings.bio')) !!}
  {!! Form::textarea('bio', $user->bio, ['class' => 'form-control']) !!}

  {!! Form::label('Profession', trans('strings.profession')) !!}
  {!! Form::text('profession', $user->profession, ['class' => 'form-control']) !!}

  {!! Form::label('Address', trans('strings.address')) !!}
  {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}

  {!! Form::label('Telephone', trans('strings.telephone')) !!}
  {!! Form::text('telephone', $user->telephone, ['class' => 'form-control']) !!}

  {!! Form::label('Cellphone', trans('strings.cellphone')) !!}
  {!! Form::text('cellphone', $user->cellphone, ['class' => 'form-control']) !!}

  {!! Form::label('Photo', trans('strings.image')) !!}
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}

  {{ Form::submit('Update', array('class' => 'btn btn-success'))}}

{!! Form::close() !!}

@stop
