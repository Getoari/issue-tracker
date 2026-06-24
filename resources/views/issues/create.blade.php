@extends('layouts.app')

@section('content')

<h2>Create Issue</h2>

<form method="POST"
      action="{{ route('issues.store') }}">

    @csrf

    <select
        name="project_id"
        class="form-control mb-3">

        @foreach($projects as $project)

            <option value="{{ $project->id }}">
                {{ $project->name }}
            </option>

        @endforeach

    </select>

    <input
        type="text"
        name="title"
        placeholder="Title"
        class="form-control mb-3">

    <textarea
        name="description"
        class="form-control mb-3"></textarea>

    <select
        name="status"
        class="form-control mb-3">

        <option value="open">Open</option>
        <option value="in_progress">In Progress</option>
        <option value="closed">Closed</option>

    </select>

    <select
        name="priority"
        class="form-control mb-3">

        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>

    </select>

    <input
        type="date"
        name="due_date"
        class="form-control mb-3">

    <button class="btn btn-success">
        Save
    </button>

</form>

@endsection