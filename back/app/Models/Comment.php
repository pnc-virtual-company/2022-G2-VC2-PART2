<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->hasMany(Comment::class,'teacher_id');
    }
    public function students()
    {
        return $this->hasMany(Comment::class,'student_id');
    }
}
