<?php

namespace App\Models;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function students()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i A');
    }
}
