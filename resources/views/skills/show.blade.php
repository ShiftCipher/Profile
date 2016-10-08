@extends('layouts.app')

@section('content')

  <div class="container">

    <h1><a href="skills">{{ $skill->name }}</a> / {{ trans('strings.courses') }}</h1>

    <hr>

    <table class="table">

    </table>

  </div>

@stop
