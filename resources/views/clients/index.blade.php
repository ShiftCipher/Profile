@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.clients')}}</h1>

  <a href="{{ route('clients.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <table>

    <thead>
      <tr>
        <th>{{trans('strings.id')}}</th>
        <th>{{trans('strings.photo')}}</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.start')}}</th>
        <th>{{trans('strings.end')}}</th>
        <th>{{trans('strings.telephone')}}</th>
        <th>{{trans('strings.cellphone')}}</th>
        <th>{{trans('strings.address')}}</th>
        <th>{{trans('strings.url')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($clients as $client)
      <tr>
        <td>{{ $client->id }}</td>
        <td><img src="{{ $client->photo }}" alt="{{ $client->name }}" style="weight:50px; height:50px;"/></td>
        <td><a href="/clients/{{ $client->id }}">{{ $client->name or 'Blank' }}</a></td>
        <td>{{ $client->start }}</td>
        <td>{{ $client->end }}</td>
        <td>{{ $client->telephone }}</td>
        <td>{{ $client->cellphone }}</td>
        <td>{{ $client->address }}</td>
        <td>{{ $client->url }}</td>
        <td>
          <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <td>
          {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
