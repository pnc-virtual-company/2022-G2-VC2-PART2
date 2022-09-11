<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    use HasFactory;
    protected $fillable = [
      


    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
