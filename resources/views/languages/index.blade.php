@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>{{trans('strings.languages')}}</h1>

    <a href="{{ route('languages.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

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

      @foreach ($languages as $language)
        <tr>
          <td>{{ $language->id }}</td>
          <td><img src="{{ $language->photo }}" alt="{{ $language->name }}" style="weight:50px; height:50px;"/></td>
          <td><a href="/languages/{{ $language->id }}">{{ $language->name or 'Blank' }}</a></td>
          <td>{{ $language->level }}</td>
          <td>
            <a href="{{ route('languages.edit', $language->id) }}" class="btn btn-warning">Edit</a>
          </td>
          <td>
            <td>
              {!! Form::open(['route' => ['languages.destroy', $language->id], 'method' => 'DELETE']) !!}
              <button class="btn btn-danger" type="submit">Delete</button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach

      </table>

    </div>

  @endsection
