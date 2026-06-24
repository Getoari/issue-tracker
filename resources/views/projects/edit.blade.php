@extends('layouts.app')

@section('content')

<h2>Edit Project</h2>

<form method="POST"
      action="{{ route('projects.update', $project) }}">

    @csrf
    @method('PUT')

    <input
        type="text"
        name="name"
        class="form-control mb-3"
        value="{{ old('name', $project->name) }}">

    <textarea
        name="description"
        class="form-control mb-3">{{ old('description', $project->description) }}</textarea>

    <input
        type="date"
        name="start_date"
        class="form-control mb-3"
        value="{{ $project->start_date }}">

    <input
        type="date"
        name="deadline"
        class="form-control mb-3"
        value="{{ $project->deadline }}">

    <button class="btn btn-primary">
        Update
    </button>

</form>

@endsection