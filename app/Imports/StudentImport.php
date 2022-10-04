<?php

namespace App\Imports;

use App\Student;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Helpers\Helper;
use App\User;
use Illuminate\Support\Str;
use App\Mail\MailNotify;
use Mail;


class StudentImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsFailures, Importable;
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
                'student_id'    => $generator,
                'firstname'     => $row['firstname'],
                'middlename'    => $row['middlename'],
                'lastname'      => $row['lastname'],
                'age'           => $row['age'],
                'gender'        => $row['gender'],
                'contact'       => $row['contact'],
                'email'         => $row['email'],
                'birthdate'     => $row['birthdate'],
                'birthplace'    => $row['birthplace'],
                'address'       => $row['address'],

        ]), 
                User::create([
                    'user_level'    => 'student',
                    'account_id'    => $generator,
                    'firstname'     => $row['firstname'],
                    'middlename'    => $row['middlename'],
                    'lastname'      => $row['lastname'],
                    'gender'        => $row['gender'],
                    'birthplace'    => $row['birthplace'],
                    'contact'       => $row['contact'],
                    'birthdate'     => $row['birthdate'],
                    'address'       => $row['address'],
                    'age'           => $row['age'],
                    'name'          => $row['firstname'].$row['lastname'],
                    'email'         => $row['email'],
                    'password'      => bcrypt($generator.$row['lastname']),]),
        ];
    }


    function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:students,email'],
        ];

    }

}
