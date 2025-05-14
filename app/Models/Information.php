<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Information extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['title', 'description', 'category', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
