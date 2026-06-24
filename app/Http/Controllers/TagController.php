<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Models\Issue;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->get();

        return view(
            'tags.index',
            compact('tags')
        );
    }

    public function store(StoreTagRequest $request) 
    {
        Tag::create(
            $request->validated()
        );

        return redirect()
            ->route('tags.index')
            ->with(
                'success',
                'Tag created successfully.'
            );
    }

    public function attach(Request $request, Issue $issue) 
    {
        $request->validate([
            'tag_id' => [
                'required',
                'exists:tags,id'
            ]
        ]);

        $issue->tags()
            ->syncWithoutDetaching([
                $request->tag_id
            ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function detach(Issue $issue, Tag $tag) 
    {
        $issue->tags()
            ->detach($tag->id);

        return response()->json([
            'success' => true
        ]);
    }
}
