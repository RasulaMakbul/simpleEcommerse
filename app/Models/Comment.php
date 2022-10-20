<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];

    public function commentedBy()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }
}
