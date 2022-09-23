<?php

namespace App\Imports;

use App\Student;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Helpers\Helper;
use App\User;
use Illuminate\Support\Facades\Hash;

use Throwable;

class StudentImport implements ToModel, WithHeadingRow,SkipsOnError
{
    use SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $student = new Student;
        $generator = Helper::IDGenerator($student,'student_id', 5, date('Y'));



        return [new Student([
            // Column name at the database
            'student_id'    => $generator,
            'firstname'     => $row['firstname'],
            'middlename'    => $row['middlename'],
            'lastname'      => $row['lastname'],
            'email'         => $generator.'@'.'email'.'.com',
            'contact'       => $row['contact'],
            'gender'        => $row['gender'],
            'birthdate'     => $row['birthdate'],
            'birthplace'    => $row['birthplace'],
            'address'       => $row['address'],
            ]), User::create([
                'user_level'=> 'students',
                'name'      =>   $row['firstname'].$row['lastname'],
                'email'     => $generator.'@'.'email'.'.com',
                'password'  => bcrypt($generator.$row['lastname']),
            ])
        ];
    }

    public function onError(Throwable $error)
    {
        
    }
}
