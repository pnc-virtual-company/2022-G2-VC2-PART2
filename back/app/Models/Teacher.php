<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    use HasFactory;
    protected $fillable=[
        'position',
        'phone',

    ];
    protected $hidden=[
        'created_at',
        'updated_at'
    ];
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
