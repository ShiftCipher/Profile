@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.projects')}}</h1>

  <a href="{{ route('projects.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

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

    @foreach ($projects as $project)
      <tr>
        <td>{{ $project->id }}</td>
        <td><img src="{{ $project->photo }}" alt="{{ $project->name }}" style="weight:50px; height:50px;"/></td>
        <td>{{ $project->category_id }}</td>
        <td>{{ $project->company }}</td>
        <td><a href="/projects/{{ $project->id }}">{{ $project->name or 'Blank' }}</a></td>
        <td>{{ $project->start }}</td>
        <td>{{ $project->end }}</td>
        <td>
          @if ($project->complete == true)
            <button class="btn btn-success" type="button">Complete</button>
          @else
            <button class="btn btn-danger" type="button">Incomplete</button>
          @endif
        </td>
        <td>{{ $project->url }}</td>
        <td>
          <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <td>
          {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
