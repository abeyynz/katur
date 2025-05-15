<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function participants()
    {
        return $this->belongsToMany(User::class, 'discussion_user', 'discussion_id', 'user_id')
                    ->withTimestamps();
    }
    public function messages()
    {
        return $this->hasMany(DiscussionMessage::class);
    }
    
}
