<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Todo extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description', 'completed'
    ];

    public function  user()
    {
        $this->belongsTo(User::class);
    }
}
