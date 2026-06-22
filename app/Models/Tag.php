<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
}
