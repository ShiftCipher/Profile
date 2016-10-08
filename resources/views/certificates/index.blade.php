@extends('layouts.app')

@section('content')

<div class="container">
  <h1>{{trans('strings.certificates')}}</h1>

  <a href="{{ route('certificates.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

  <table>

    <thead>
      <tr>
        <th>{{trans('strings.id')}}</th>
        <th>{{trans('strings.photo')}}</th>
        <th>{{trans('strings.name')}}</th>
        <th>{{trans('strings.company')}}</th>
        <th>{{trans('strings.code')}}</th>
        <th>{{trans('strings.date')}}</th>
        <th>{{trans('strings.url')}}</th>
        <th colspan="2">{{trans('strings.actions')}}</th>
      </tr>
    </thead>

    @foreach ($certificates as $certificate)
      <tr>
        <td>{{ $certificate->id }}</td>
        <td><img src="{{ $certificate->photo }}" alt="{{ $certificate->name }}" style="weight:50px; height:50px;"/></td>
        <td><a href="/certificates/{{ $certificate->id }}">{{ $certificate->name or 'Blank' }}</a></td>
        <td>{{ $certificate->company }}</td>
        <td>{{ $certificate->code }}</td>
        <td>{{ $certificate->date }}</td>
        <td>{{ $certificate->url }}</td>
        <td>
          <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <td>
          {!! Form::open(['route' => ['certificates.destroy', $certificate->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

  </div>

@endsection
