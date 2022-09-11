<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'last_name',
        'position',
        'email',
    ];
    protected $hidden=[
        'created_at',
        'updated_at'
    ];
}