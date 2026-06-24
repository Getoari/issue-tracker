@extends('layouts.app')

@section('content')

<h2>Projects</h2>

<a href="{{ route('projects.create') }}"
   class="btn btn-success mb-3">
    Create Project
</a>

<table class="table table-bordered">

    <thead>
    <tr>
        <th>Name</th>
        <th>Start Date</th>
        <th>Deadline</th>
        <th>Issues</th>
        <th>Actions</th>
    </tr>
    </thead>

    <tbody>

    @foreach($projects as $project)

        <tr>

            <td>{{ $project->name }}</td>

            <td>{{ $project->start_date }}</td>

            <td>{{ $project->deadline }}</td>

            <td>{{ $project->issues_count ?? 0 }}</td>

            <td>

                <a href="{{ route('projects.show', $project) }}"
                   class="btn btn-sm btn-primary">
                    View
                </a>

                <a href="{{ route('projects.edit', $project) }}"
                   class="btn btn-sm btn-warning">
                    Edit
                </a>

                <form
                    action="{{ route('projects.destroy', $project) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Delete project?')"
                        class="btn btn-sm btn-danger">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

{{ $projects->links() }}

@endsection