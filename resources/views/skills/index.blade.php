@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.skills')}}</h1>

  <a href="{{ route('skills.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <table>

    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Level</th>
        <th colspan="2">Actions</th>
      </tr>
    </thead>

    @foreach ($skills as $skill)
      <tr>
        <td>{{ $skill->id }}</td>
        <td><img src="{{ $skill->photo }}" alt="{{ $skill->name }}" style="weight:50px; height:50px;"/></td>
        <td><a href="/skills/{{ $skill->id }}">{{ $skill->name or 'Blank' }}</a></td>
        <td>{{ $skill->level }}</td>
        <td>
          <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <td>
          {!! Form::open(['route' => ['skills.destroy', $skill->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
