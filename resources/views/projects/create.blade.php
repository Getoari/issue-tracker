@extends('layouts.app')

@section('content')

<h2>Create Project</h2>

<form method="POST"
      action="{{ route('projects.store') }}">

    @csrf

    <div class="mb-3">
        <label>Name</label>

        <input
            type="text"
            name="name"
            class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>

        <textarea
            name="description"
            class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Start Date</label>

        <input
            type="date"
            name="start_date"
            class="form-control">
    </div>

    <div class="mb-3">
        <label>Deadline</label>

        <input
            type="date"
            name="deadline"
            class="form-control">
    </div>

    <button class="btn btn-success">
        Save
    </button>

</form>

@endsection