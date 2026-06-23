<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
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
