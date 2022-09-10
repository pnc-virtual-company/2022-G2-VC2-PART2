<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'batch',
        'email',
        'gender',
        'phone',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
