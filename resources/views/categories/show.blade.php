@extends('layouts.app')

@section('content')

  <div class="container">
    <br>
    <h1><a href="categories">{{ $category->name }}</a> / {{ trans('strings.courses') }}</h1>

    <hr>

    <table class="table">

    </table>

  </div>
@stop
