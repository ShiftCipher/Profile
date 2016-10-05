@extends('layouts.app')

@section('content')

  <h1>{{trans('strings.courses')}}</h1>

  <a href="{{ route('courses.create') }}" class="btn btn-primary">{{trans('strings.create')}}</a>

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

    @foreach ($courses as $course)
      <tr>
        <td>{{ $course->id }}</td>
        <td><img src="{{ $course->photo }}" alt="{{ $course->name }}" style="weight:50px; height:50px;"/></td>
        <td>{{ $course->category_id }}</td>
        <td>{{ $course->company }}</td>
        <td><a href="/courses/{{ $course->id }}">{{ $course->name or 'Blank' }}</a></td>
        <td>{{ $course->start }}</td>
        <td>{{ $course->end }}</td>
        <td>
          @if ($course->complete == true)
            <button class="btn btn-success" type="button">Complete</button>
          @else
            <button class="btn btn-danger" type="button">Incomplete</button>
          @endif
        </td>
        <td>{{ $course->url }}</td>
        <td>
          <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
        </td>
        <td>
        <td>
          {!! Form::open(['route' => ['courses.destroy', $course->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit">Delete</button>
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach

  </table>

@endsection
