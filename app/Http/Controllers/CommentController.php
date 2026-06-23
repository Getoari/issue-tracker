<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Issue;

class CommentController extends Controller
{
    public function index(Issue $issue) 
    {
        return response()->json(
            $issue->comments()
                ->latest()
                ->paginate(5)
        );
    }

    public function store(StoreCommentRequest $request, Issue $issue) 
    {
        $comment = $issue
            ->comments()
            ->create(
                $request->validated()
            );

        return response()->json(
            $comment
        );
    }
}
