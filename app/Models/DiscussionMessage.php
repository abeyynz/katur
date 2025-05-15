<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscussionMessage extends Model
{
    protected $fillable = ['discussion_id', 'user_id', 'message'];

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
