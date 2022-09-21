<?php
namespace App\Imports;
use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $user = new User([
            'first_name'         => $row['first_name'],
            'last_name'              => $row['last_name'],
            'email'               => $row['email'],
            'gender'         => $row['gender'],
            'role'=>3,          
        ]);
        $student =new Student([
            'generation'         => $row['generation'],
            'phone'              => $row['phone'],
            'class'               => $row['class'],
            'major'         => $row['major'],
            'date_of_birth' => date('Y-m-d H:i:s', strtotime($row['date_of_birth'])),
            'status'   => false,
           
        ]);
        $user->save();
        $user->students()->save($student);
    }
}

