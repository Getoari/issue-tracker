@extends('layouts.app')

@section('content')

<h2>Issues</h2>

<a href="{{ route('issues.create') }}"
   class="btn btn-success mb-3">
    Create Issue
</a>

<form class="row mb-3">

    <div class="col">

        <select
            name="status"
            class="form-control">

            <option value="">
                All Status
            </option>

            <option value="open">
                Open
            </option>

            <option value="in_progress">
                In Progress
            </option>

            <option value="closed">
                Closed
            </option>

        </select>

    </div>

    <div class="col">

        <select
            name="priority"
            class="form-control">

            <option value="">
                All Priority
            </option>

            <option value="low">
                Low
            </option>

            <option value="medium">
                Medium
            </option>

            <option value="high">
                High
            </option>

        </select>

    </div>

    <div class="col">

        <button class="btn btn-primary">
            Filter
        </button>

    </div>

</form>

@foreach($issues as $issue)

<div class="card mb-2">

    <div class="card-body">

        <h5>{{ $issue->title }}</h5>

        <p>{{ $issue->project->name }}</p>

        <span class="badge bg-info">
            {{ $issue->priority }}
        </span>

        <span class="badge bg-secondary">
            {{ $issue->status }}
        </span>

        <a href="{{ route('issues.show',$issue) }}"
           class="btn btn-sm btn-primary">
            View
        </a>

    </div>

</div>

@endforeach

@endsection