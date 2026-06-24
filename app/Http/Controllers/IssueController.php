<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssueRequest;
use App\Models\Issue;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Issue::query()
            ->with(['project', 'tags']);

        if ($request->status) {
            $query->where(
                'status',
                $request->status
            );
        }

        if ($request->priority) {
            $query->where(
                'priority',
                $request->priority
            );
        }

        if ($request->tag) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('tags.id', $request->tag);
            });
        }

        $issues = $query
            ->latest()
            ->paginate(10);

        $tags = Tag::all();

        return view(
            'issues.index',
            compact('issues', 'tags')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::orderBy('name')->get();

        return view('issues.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIssueRequest $request)
    {
        Issue::create(
            $request->validated()
        );

        return redirect()
            ->route('issues.index')
            ->with('success', 'Issue created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
        $issue->load([
            'project',
            'tags'
        ]);

        $allTags = Tag::all();

        return view(
            'issues.show',
            compact(
                'issue',
                'allTags'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
