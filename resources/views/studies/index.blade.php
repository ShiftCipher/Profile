@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>{{trans('strings.studies')}}</h1>

    <a href="{{ route('studies.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

    <table>
      <thead>
        <tr>
          <th>{{trans('strings.id')}}</th>
          <th>{{trans('strings.photo')}}</th>
          <th>{{trans('strings.category')}}</th>
          <th>{{trans('strings.company')}}</th>
          <th>{{trans('strings.name')}}</th>
          <th>{{trans('strings.start')}}</th>
          <th>{{trans('strings.end')}}</th>
          <th>{{trans('strings.complete')}}</th>
          <th>{{trans('strings.url')}}</th>
          <th colspan="2">{{trans('strings.actions')}}</th>
        </tr>
      </thead>

      @foreach ($studies as $study)
        <tr>
          <td>{{ $study->id }}</td>
          <td><img src="{{ $study->photo }}" alt="{{ $study->name }}" style="weight:50px; height:50px;"/></td>
          <td>{{ $study->category_id }}</td>
          <td>{{ $study->company }}</td>
          <td><a href="/studies/{{ $study->id }}">{{ $study->name or 'Blank' }}</a></td>
          <td>{{ $study->start }}</td>
          <td>{{ $study->end }}</td>
          <td>
            @if ($study->complete == true)
              <button class="btn btn-success" type="button">Complete</button>
            @else
              <button class="btn btn-danger" type="button">Incomplete</button>
            @endif
          </td>
          <td>{{ $study->url }}</td>
          <td>
            <a href="{{ route('studies.edit', $study->id) }}" class="btn btn-warning">Edit</a>
          </td>
          <td>
            <td>
              {!! Form::open(['route' => ['studies.destroy', $study->id], 'method' => 'DELETE']) !!}
              <button class="btn btn-danger" type="submit">Delete</button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </table>

    </div>

  @endsection
