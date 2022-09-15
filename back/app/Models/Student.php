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
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $casts = [
        'status'=> 'boolean',
    ];
}
