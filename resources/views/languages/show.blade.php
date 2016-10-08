@extends('layouts.app')

@section('content')

  <div class="container">

    <h1><a href="categories">{{ $language->name }}</a> / {{ trans('strings.courses') }}</h1>

    <hr>

    <table class="table">

    </table>

  </div>

@stop
