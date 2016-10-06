@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="col-md-6">
      <img src="{{ $user->photo }}" alt="" />
    </div>
    <div class="col-md-6">
      <div class="">{{ $user->name }}</div>
      <div class="">{{ $user->email }}</div>
      <div class="">{{ $user->nickname }}</div>
      <div class="">{{ $user->address }}</div>
      <div class="">{{ $user->telephone }}</div>
      <div class="">{{ $user->cellphone }}</div>
    </div>
  </div>

  <hr>



    <div class="container">
      <h1>Courses</h1>
      @foreach ($courses as $course)
        <li>
          <td><img src="{{ $course->photo }}" alt="{{ $course->name }}" style="weight:100px; height:100px;"/></td>
          <td>{{ $course->category_id }}</td>
          <td>{{ $course->company }}</td>
          <td><a href="/courses/{{ $course->id }}">{{ $course->name or 'Blank' }}</a></td>
          <td>{{ $course->start }}</td>
          <td>{{ $course->end }}</td>
          <td>{{ $course->url }}</td>
          <td>
            @if ($course->complete == true)
              <button class="btn btn-success" type="button">Complete</button>
            @else
              <button class="btn btn-danger" type="button">Incomplete</button>
            @endif
          </td>
        </li>
      @endforeach

      <h1>Education</h1>
      @foreach ($studies as $study)
        <li>
          <td><img src="{{ $study->photo }}" alt="{{ $study->name }}" style="weight:100px; height:100px;"/></td>
          <td>{{ $study->category_id }}</td>
          <td>{{ $study->company }}</td>
          <td><a href="/studies/{{ $study->id }}">{{ $study->name or 'Blank' }}</a></td>
          <td>{{ $study->start }}</td>
          <td>{{ $study->end }}</td>
        </li>
      @endforeach

      <h1>Skills</h1>
      @foreach ($skills as $skill)
        <li>
          <td><img src="{{ $skill->photo }}" alt="{{ $skill->name }}" style="weight:100px; height:100px;"/></td>
          <td><a href="/skills/{{ $skill->id }}">{{ $skill->name or 'Blank' }}</a></td>
          <td>{{ $skill->level }}</td>
        </li>
      @endforeach

      <h1>Certificates</h1>
      @foreach ($certificates as $certificate)
        <li>
          <td><img src="{{ $certificate->photo }}" alt="{{ $certificate->name }}" style="weight:100px; height:100px;"/></td>
          <td><a href="/certificates/{{ $certificate->id }}">{{ $certificate->name or 'Blank' }}</a></td>
          <td>{{ $certificate->company }}</td>
          <td>{{ $certificate->code }}</td>
          <td>{{ $certificate->date }}</td>
          <td>{{ $certificate->url }}</td>
        </li>
      @endforeach
      <hr>

      <h1>Languages</h1>
      @foreach ($languages as $language)
        <li>
          <td><img src="{{ $language->photo }}" alt="{{ $language->name }}" style="weight:100px; height:100px;"/></td>
          <td><a href="/languages/{{ $language->id }}">{{ $language->name or 'Blank' }}</a></td>
          <td>{{ $language->level }}</td>
        </li>
      @endforeach
    </div>
</div>

<!--CLIENTS-->
<div class="container">
  <div class="clients">
    <h1 class="title">Clients</h1>
    <hr>
    @foreach ($clients as $client)
      <div class="client">
        <div class="col-md-6">
          <img class="img-responsive client-photo" src="{{ $client->photo }}" alt="{{ $client->name }}"/>
        </div>
        <div class="col-md-6">
          <div class="client-info">
            <div class="subtitle">{{ $client->name }}</div>
            <div class="subtitle">{{ $client->start }} to {{ $client->end }}</div>
            <div class="caption">{{ $client->telephone }}</div>
            <div class="caption">{{ $client->cellphone }}</div>
            <div class="caption">{{ $client->address }}</div>
            <div class="caption">{{ $client->url }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<!--PROJECTS-->
<div class="container">
  <div class="projects">
    <h1 class="title">Projects</h1>
    <hr>
    @foreach ($projects as $project)
      <div class="project" style="background-image: url({{ $project->photo }});">
        <div class="project-info">
          <div class="subtitle">{{ $project->name }}</div>
          <div class="caption">{{ $project->end }}</div>
          <div class="caption">{{ $project->description }}</div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<!--SOCIAL-->
<div class="container">
  <h1 class="title">Social</h1>
  <hr>
  @foreach ($services as $service)
    <div class="col-md-3">
      <a href="{{ $service->url }}">
        <img class="img-responsive service-photo" src="{{ $service->photo }}" alt=""/>
      </a>
      {{$service->name}} {{ $service->url }}
    </div>
  @endforeach
</div>


@endsection
