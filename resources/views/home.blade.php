@extends('layouts.app')

@section('content')

  <img src="{{ $user->photo }}" alt="" />
  <h3>{{ $user->name }}</h3>
  <h3>{{ $user->email }}</h3>
  <h3>{{ $user->nickname }}</h3>
  <h3>{{ $user->address }}</h3>
  <h3>{{ $user->telephone }}</h3>
  <h3>{{ $user->cellphone }}</h3>

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

  <h1>Clients</h1>

  @foreach ($clients as $client)
    <li>
      <td><img src="{{ $client->photo }}" alt="{{ $client->name }}" style="weight:100px; height:100px;"/></td>
      <td><a href="/clients/{{ $client->id }}">{{ $client->name or 'Blank' }}</a></td>
      <td>{{ $client->start }}</td>
      <td>{{ $client->end }}</td>
      <td>{{ $client->telephone }}</td>
      <td>{{ $client->cellphone }}</td>
      <td>{{ $client->address }}</td>
      <td>{{ $client->url }}</td>
    </li>
  @endforeach

  <hr>

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

  <hr>

  <h1>Languages</h1>

  @foreach ($languages as $language)
    <li>
      <td><img src="{{ $language->photo }}" alt="{{ $language->name }}" style="weight:100px; height:100px;"/></td>
      <td><a href="/languages/{{ $language->id }}">{{ $language->name or 'Blank' }}</a></td>
      <td>{{ $language->level }}</td>
    </li>
  @endforeach

  <hr>

  <h1>Galery</h1>

  @foreach ($photos as $photo)
    <tr>
      <td><img src="{{ $photo->photo }}" alt="{{ $photo->photo }}" style="weight:200px; height:200px;"/></td>
    </tr>
  @endforeach

  <hr>

  <h1>Projects</h1>

  @foreach ($projects as $project)
    <li>
      <td><img src="{{ $project->photo }}" alt="{{ $project->name }}" style="weight:100px; height:100px;"/></td>
      <td>{{ $project->category_id }}</td>
      <td>{{ $project->company }}</td>
      <td><a href="/projects/{{ $project->id }}">{{ $project->name or 'Blank' }}</a></td>
      <td>{{ $project->start }}</td>
      <td>{{ $project->end }}</td>
      <td>{{ $project->url }}</td>
      <td>
        @if ($project->complete == true)
          <button class="btn btn-success" type="button">Complete</button>
        @else
          <button class="btn btn-danger" type="button">Incomplete</button>
        @endif
      </td>
    </li>
  @endforeach

  <hr>

  <h1>Follow</h1>

  @foreach ($services as $service)
    <li>
      <td><img src="{{ $service->photo }}" alt="{{ $service->name }}" style="weight:100px; height:100px;"/></td>
      <td><a href="/services/{{ $service->id }}">{{ $service->name or 'Blank' }}</a></td>
      <td>{{ $service->url }}</td>
    </li>
  @endforeach

  <hr>

  <h1>Skills</h1>

  @foreach ($skills as $skill)
    <li>
      <td><img src="{{ $skill->photo }}" alt="{{ $skill->name }}" style="weight:100px; height:100px;"/></td>
      <td><a href="/skills/{{ $skill->id }}">{{ $skill->name or 'Blank' }}</a></td>
      <td>{{ $skill->level }}</td>
    </li>
  @endforeach

  <hr>

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

@endsection
