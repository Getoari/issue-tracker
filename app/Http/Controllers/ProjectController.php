<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view(
            'projects.index',
            compact('projects')
        );
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        Project::create(
            $request->validated()
        );

        return redirect()
            ->route('projects.index');
    }

    public function show(Project $project)
    {
        $project->load('issues');

        return view(
            'projects.show',
            compact('project')
        );
    }

    public function edit(Project $project)
    {
        return view(
            'projects.edit',
            compact('project')
        );
    }

    public function update(UpdateProjectRequest $request, Project $project) 
    {
        $project->update(
            $request->validated()
        );

        return redirect()
            ->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return back();
    }
}