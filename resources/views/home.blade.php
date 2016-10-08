@extends('layouts.app')

@section('content')

  <!-- Main container -->
  <div class="page-container">

    <!-- bloc-0 -->
    <div class="bloc bg-mountains-italy bloc-fill-screen bgc-black d-bloc" id="bloc-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <img src="/img/profile.png" class="center-block swing-hvr animDelay2 " width="270" height="270" title="This is a tooltip" alt="xYz" />
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-0 END -->

    <!-- bloc-1 -->
    <div class="bloc bgc-black d-bloc" id="bloc-1">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="text-center tc-white mg-sm">
              {{ $user->name }}
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-1 END -->

    <!-- Bloc Group -->
    <div class='bloc-group'>

      <!-- bloc-2 -->
      <div class="bloc bloc-tile-2 bgc-black d-bloc" id="bloc-2">
        <div class="container bloc-sm">
          <div class="row">
            <div class="col-sm-12">
              <img src="{{ $user->photo }}" class="img-responsive img-circle center-block mg-sm" />
            </div>
          </div>
        </div>
      </div>
      <!-- bloc-2 END -->

      <!-- bloc-3 -->
      <div class="bloc bloc-tile-2 bgc-black d-bloc" id="bloc-3">
        <div class="container bloc-sm">
          <div class="row voffset-lg">
            <div class="col-sm-12">
              <blockquote>
                <p>
                  Profession : {{ $user->profession }}
                </p>
              </blockquote>
              <blockquote>
                <p>
                  Nickname : {{ $user->nickname }}
                </p>
              </blockquote>
              <blockquote>
                <p>
                  Email : {{ $user->email }}
                </p>
              </blockquote>
              <blockquote>
                <p>
                  Adress : {{ $user->address }}
                </p>
              </blockquote>
              <blockquote>
                <p>
                  Telephone : {{ $user->telephone }}
                </p>
              </blockquote>
              <blockquote>
                <h1>Bio</h1>
                <p>
                  {{ $user->bio }}
                </p>
              </blockquote>
            </div>
          </div>
        </div>
      </div>
      <!-- bloc-3 END -->
    </div>
    <!-- Bloc Group END -->

    <!-- bloc-4 -->
    <div class="bloc bgc-black d-bloc" id="bloc-4">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Education
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-4 END -->


    @foreach ($studies as $study)
      <!-- bloc-5 -->
      <div class="bloc bgc-black d-bloc" id="bloc-5">
        <div class="container bloc-sm">
          <div class="row">
            <div class="col-sm-6">
              <img src="img/desk-equipment.jpg" class="img-responsive" />
            </div>
            <div class="col-sm-6">
              <h2 class="mg-md">
                {{ $study->name }}
              </h2>
              <h4 class="mg-sm">
                {{ $study->company }}
              </h4>

              <h5 class="mg-sm">
                {{ $study->start }} to {{ $study->end }}
              </h5>
              <h4 class="mg-sm">
                Description
              </h4>
              <p class="mg-lg">
                {{ $study->description }}
              </p>
              @if ($study->url)
                <h5 class="mg-sm">
                  <a href="{{ $study->url }}">Read More</a>
                </h5>
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- bloc-5 END -->
    @endforeach

    <!-- bloc-6 -->
    <div class="bloc bgc-black d-bloc" id="bloc-4">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Education
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-6 END -->

    <!-- bloc-7 -->
    <div class="bloc bgc-black d-bloc" id="bloc-7">
      <div class="container bloc-sm">
        <div class="row">
          @foreach ($courses as $course)
            <div class="col-md-4">
              <div class="panel">
                <div class="panel-heading" style="background-image: url({{ $course->photo }})">
                </div>
                <div class="panel-body">
                  <h4 class="text-center">
                    {{ $course->company }}
                  </h4>
                  <h3 class="text-center">
                    {{ $course->name }}
                  </h3>
                  <p>
                    {{ $course->description }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- bloc-7 END -->

    <!-- bloc-8 -->
    <div class="bloc bgc-black d-bloc" id="bloc-8">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Certificates
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-8 END -->

    <!-- bloc-9 -->
    <div class="bloc bgc-black tc-white" id="bloc-9">
      <div class="container bloc-sm">
        <div class="row">
          @foreach ($certificates as $certificate)
            <div class="col-sm-6 mg-md">
              <h2 class="mg-lg tc-white">
                {{ $certificate->name }}
              </h2>
              <h3 class="mg-sm tc-white">
                {{ $certificate->company }}
              </h3>
              <h4 class="mg-sm tc-white">
                {{ $certificate->date }}
              </h4>
              <p class="mg-lg">
                License {{ $certificate->code }}
              </p>
            </div>
            <div class="col-sm-6">
              <a href="{{ $certificate->url }}"><img src="{{ $certificate->photo }}" class="img-responsive" /></a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- bloc-9 END -->

    <!-- bloc-10 -->
    <div class="bloc bgc-black d-bloc" id="bloc-10">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Skills
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-10 END -->

    <!-- bloc-11 -->
    <div class="bloc bgc-black d-bloc" id="bloc-11">
      <div class="container bloc-sm">
        <div class="row">
          @foreach ($skills as $skill)
            <div class="col-sm-2 text-center">
              <h3 class="stat-bloc-text tc-white">
                {{ $skill->level }}
              </h3>
              <p class="stat-bloc-sub-text">
                {{ $skill->name }}
              </p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- bloc-11 END -->

    <!-- bloc-12 -->
    <div class="bloc bgc-black d-bloc" id="bloc-12">
      <div class="container bloc-sm">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Projects
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-12 END -->

    <!-- bloc-14 -->
    <!-- bloc-15 -->
    @foreach ($projects as $project)
      <div class="bloc bgc-black d-bloc bloc-fill-screen" style="background-image: url({{ $project->photo }}); background-size: contain;" id="bloc-14">
        <div class="container">
          <div class="row voffset-lg">
            <div class="col-sm-12">
              <h3 class="text-center mg-lg ">
                {{ $project->name }}
              </h3>
              <p class="mg-clear text-center ">
                {{ $project->description }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="bloc bgc-black d-bloc" id="bloc-15">
        <div class="container bloc-lg">
          <div class="row voffset">
            @foreach ($project->photos as $photo)
              <div class="col-sm-3">
                <a href="{{ $project->url }}" data-lightbox="{{ $photo->photo }}" data-caption="{{ $project->name }}"><img src="{{ $photo->photo }}" class="img-responsive" /></a>
              </div>
            @endforeach
          </div>
        </div>
      </div>

    @endforeach
    <!-- bloc-14 END -->
    <!-- bloc-15 END -->

    <!-- bloc-16 -->
    <div class="bloc bgc-black d-bloc" id="bloc-16">
      <div class="container bloc-sm">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Languages
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- bloc-16 END -->

    <!-- bloc-17 -->
    <div class="bloc feature-list tc-white bgc-black" id="bloc-17">
      <div class="container bloc-sm">
        <div class="row">
          @foreach ($languages as $language)
            <div class="col-sm-6">
              <div class="col-sm-3">
                <img src="{{ $language->photo }}" class="img-responsive" />
              </div>
              <div class="col-sm-6">
                <h3 class="text-center mg-md tc-white">
                  {{ $language->name }}
                </h3>
                <p class="text-center ">
                  {{ $language->level }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- bloc-17 END -->

    <!-- ScrollToTop Button -->
    <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span class="fa fa-chevron-up"></span></a>
    <!-- ScrollToTop Button END-->


    <!-- Footer - bloc-18 -->
    <div class="bloc bgc-black d-bloc" id="bloc-18">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Costumers
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer - bloc-18 END -->


    <!-- Footer - bloc-19 -->
    <div class="bloc bgc-white l-bloc" id="bloc-19">
      <div class="container bloc-sm">
        <div class="row bgc-white">
          <div class="col-xs-12 col-md-8 col-md-offset-2">
            @foreach ($clients as $client)
              <div class="col-sm-2">
                <img src="{{ $client->photo }}" class="img-responsive center-block" />
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- Footer - bloc-19 END -->

    <!-- Footer - bloc-21 -->
    <div class="bloc tc-white bgc-black" id="bloc-21">
      <div class="container bloc-sm">
        <div class="row voffset-lg">
          @foreach ($clients->take(4) as $client)
            <div class="col-sm-3">
              <img src="img/placeholder-user.png" class="img-responsive" />
              <h3 class="text-center mg-md tc-white">
                {{ $client->name }}
              </h3>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Footer - bloc-21 END -->

    <!-- Footer - bloc-22 -->
    <div class="bloc bgc-black tc-white" id="bloc-22">
      <div class="container">
        <div class="row voffset-lg">
          @foreach ($clients as $client)
            <div class="col-sm-6">
              <div class="col-sm-6">
                <img src="img/placeholder-user.png" class="img-responsive img-circle" />
              </div>
              <div class="col-sm-6">
                <h3 class="mg-md text-center tc-white">
                  {{ $client->name }}
                </h3>
                <h4 class="mg-md text-center tc-white">
                  {{ $client->start }} to {{ $client->end }}
                </h4>
                <p class="text-center">
                  {{ $client->cellphone }}
                </p>
                <p class="text-center">
                  {{ $client->address }}
                </p>
                <p class="text-center">
                  {{ $client->url }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Footer - bloc-22 END -->

    <!-- Footer - bloc-23 -->
    <div class="bloc bgc-black d-bloc" id="bloc-23">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2">
            <h3 class="statement-bloc-text text-left text-center tc-white mg-clear-xs">
              "Good design is making something intelligible and memorable. Great design is making something memorable and meaningful."
            </h3>
            <p class="text-center">
              <strong>Dieter Rams</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer - bloc-23 END -->

    <!-- Footer - bloc-23 -->
    <div class="bloc bgc-black d-bloc" id="bloc-23">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2">
            <h3 class="statement-bloc-text text-left text-center tc-white mg-clear-xs">
              "Simplicity is the ultimate Sophistication"
            </h3>
            <p class="text-center">
              <strong>Da Vinci</strong>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer - bloc-23 END -->

    <!-- Footer - bloc-24 -->
    <div class="bloc bgc-black d-bloc" id="bloc-24">
      <div class="container bloc-sm">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="mg-md text-center tc-white">
              Social
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer - bloc-24 END -->

    <!-- Footer - bloc-26 -->
    <div class="bloc bgc-black d-bloc" id="bloc-26">
      <div class="container bloc-sm">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2 col-sm-12">
            @foreach ($services as $service )
              <div class="mg-lg col-sm-3 text-center">
                <a class="social-md" href="{{ $service->url }}"><span class="{{ $service->icon }}"></span></a>
                <p class="text-center">
                  {{ $service->user }}
                </p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- Footer - bloc-26 END -->

    <!-- Footer - bloc-28 -->
    <div class="bloc bgc-black d-bloc" id="bloc-28">
      <div class="container bloc-md">
        <div class="row">
          <div class="col-sm-12">
            <h4 class="mg-md text-center tc-outer-space">
              Made with Laravel - Daniel Tarazona - Copyright - 2016
            </h4>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer - bloc-28 END -->
  </div>

@endsection
