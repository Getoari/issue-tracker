@extends('layouts.app')

@section('content')

<h2>{{ $project->name }}</h2>

<p>{{ $project->description }}</p>

<p>
    Start: {{ $project->start_date }}
</p>

<p>
    Deadline: {{ $project->deadline }}
</p>

<hr>

<h4>Issues</h4>

@forelse($project->issues as $issue)

    <div class="card mb-2">

        <div class="card-body">

            <strong>{{ $issue->title }}</strong>

            <span class="badge bg-primary">
                {{ $issue->status }}
            </span>

        </div>

    </div>

@empty

    <p>No issues.</p>

@endforelse

@endsection