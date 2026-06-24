<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Issue;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color'
    ];

    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
}
