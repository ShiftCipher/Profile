@extends('layouts.app')

@section('content')

<div class="container">

<table>

<thead>
  <tr>
    <th>Name</th>
    <th>Photo</th>
  </tr>
</thead>

  @foreach ($categories as $category)
    <tr>
      <td>{{ $category->name }}</td>
      <td><img src="{{ $category->photo }}" alt="" style="height:100px; width:100px;"/></td>
      <td>
        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash-o fa-lg" type="submit"></i></button>
        {!! Form::close() !!}
      </td>
    </tr>
  @endforeach

</table>

</div>
@endsection
