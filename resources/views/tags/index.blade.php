@extends('layouts.app')

@section('content')

<h2>Tags</h2>

<form method="POST"
      action="{{ route('tags.store') }}">

    @csrf

    <input
        type="text"
        name="name"
        placeholder="Tag Name"
        class="form-control mb-2">

    <input
        type="color"
        name="color"
        class="form-control mb-2">

    <button
        class="btn btn-success">
        Create Tag
    </button>

</form>

<hr>

@foreach($tags as $tag)

    <span
        class="badge"
        style="background-color: {{ $tag->color ?? '#6c757d' }}">

        {{ $tag->name }}

    </span>

@endforeach

@endsection