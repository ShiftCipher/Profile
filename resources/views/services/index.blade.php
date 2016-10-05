@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.services')}}</h1>

  <a href="{{ route('services.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <table>

    <thead>
      <tr>
        <th>{{trans('strings.id')}}</th>
        <th>{{trans('strings.photo')}}</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.url')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($services as $service)
      <tr>
        <td>{{ $service->id }}</td>
        <td><img src="{{ $service->photo }}" alt="{{ $service->name }}" style="weight:50px; height:50px;"/></td>
        <td><a href="/services/{{ $service->id }}">{{ $service->name or 'Blank' }}</a></td>
        <td>{{ $service->url }}</td>
        <td>
          <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <td>
          {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
