@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.categories')}}</h1>

  <a href="{{ route('categories.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <table>

    <thead>
      <tr>
        <th>Photo</th>
        <th>Name</th>
        <th colspan="2">Actions</th>
      </tr>
    </thead>

    @foreach ($categories as $category)
      <tr>
        <td><img src="{{ $category->photo }}" alt="{{ $category->name }}" style="weight:50px; height:50px;"/></td>
        <td><a href="/categories/{{ $category->id }}">{{ $category->name or 'Blank' }}</a></td>
        <td>
          <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <td>
          {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
