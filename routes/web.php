<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('projects.index');
});

Route::resource('projects', ProjectController::class);

Route::resource('issues', IssueController::class);

Route::resource('tags', TagController::class)
    ->only(['index','store']);

Route::post(
    '/issues/{issue}/tags',
    [TagController::class, 'attach']
);

Route::delete(
    '/issues/{issue}/tags/{tag}',
    [TagController::class, 'detach']
);

Route::get(
    '/issues/{issue}/comments',
    [CommentController::class, 'index']
);

Route::post(
    '/issues/{issue}/comments',
    [CommentController::class, 'store']
);