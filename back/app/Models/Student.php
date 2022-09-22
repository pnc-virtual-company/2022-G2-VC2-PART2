<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'generation',
        'phone',
        'date_of_birth',
        'status',
        'tutor',
        'reason',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'student_id');
    }

    protected $casts = [
        'status'=> 'boolean',
    ];
    
}
