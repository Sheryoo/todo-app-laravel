<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';
    protected $fillable = ['title', 'description', 'completed', 'deadline', 'user_id'];
    protected $casts = [
        'completed' => 'boolean',
        'deadline' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function complete()
    {
        $this->completed = true;
        $this->save();
    }

    public function incomplete()
    {
        $this->completed = false;
        $this->save();
    }
}

