@if(Auth::check())
  <li><a href="{{ url('categories') }}">{{trans('strings.categories')}}</a></li>
  <li><a href="{{ url('certificates') }}">{{trans('strings.certificates')}}</a></li>
  <li><a href="{{ url('clients') }}">{{trans('strings.clients')}}</a></li>
  <li><a href="{{ url('courses') }}">{{trans('strings.courses')}}</a></li>
  <li><a href="{{ url('studies') }}">{{trans('strings.studies')}}</a></li>
  <li><a href="{{ url('languages') }}">{{trans('strings.languages')}}</a></li>
  <li><a href="{{ url('photos') }}">{{trans('strings.photos')}}</a></li>
  <li><a href="{{ url('projects') }}">{{trans('strings.projects')}}</a></li>
  <li><a href="{{ url('services') }}">{{trans('strings.services')}}</a></li>
  <li><a href="{{ url('skills') }}">{{trans('strings.skills')}}</a></li>
  <li><a href="{{ url('users/' . Auth::id() . '/edit') }}">{{trans('strings.profile')}}</a></li>
@endif
