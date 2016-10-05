@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.photos')}}</h1>

  {!! Form::open(['route' => 'photos.store', 'files' => true, 'method' => 'POST']) !!}

    {!! Form::label('Photo', trans('strings.image')) !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}

    {!! Form::label('Project', trans('strings.project')) !!}
    {!! Form::select('project_id', $projects, null, ['class' => 'form-control']) !!}

    {{ Form::submit('Upload', array('class' => 'btn btn-success'))}}

  {!! Form::close() !!}

  <table>

    <thead>
      <tr>
        <th>{{trans('strings.id')}}</th>
        <th>{{trans('strings.project')}}</th>
        <th>{{trans('strings.photo')}}</th>
        <th>{{trans('strings.direction')}}</th>
        <th>{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($photos as $photo)
      <tr>
        <td>{{ $photo->id }}</td>
        <td>{{ $photo->project_id }}</td>
        <td><img src="{{ $photo->photo }}" alt="{{ $photo->photo }}" style="weight:150px; height:150px;"/></td>
        <td><a href="/photos/{{ $photo->id }}">{{ $photo->photo or 'Blank' }}</a></td>
        <td>
          {!! Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
