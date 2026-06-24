<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Issue;
class Comment extends Model
{
    protected $fillable = [
        'issue_id',
        'author_name',
        'body',
    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
