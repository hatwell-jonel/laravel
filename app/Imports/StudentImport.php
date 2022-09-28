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
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use App\Helpers\Helper;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Validators\Failure;


class StudentImport implements ToModel, WithHeadingRow,WithValidation, SkipsOnError,SkipsOnFailure
{
    use SkipsErrors, SkipsFailures;
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
                    // Column name at the database $row['column_name']

                    // autogenerate ID
                    'student_id'    => $generator,
                    'firstname'     => $row['firstname'],
                    'middlename'    => $row['middlename'],
                    'lastname'      => $row['lastname'],
                    'email'         => $generator.'@student.com',
                    'contact'       => $row['contact'],
                    'gender'        => $row['gender'],
                    'birthdate'     => $row['birthdate'],
                    'age'           => $row['age'],
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
                    'name'          =>   $row['firstname'].$row['lastname'],
                    'email'         => $generator.'@student.com',
                    'password'      => bcrypt($generator.$row['lastname']),
            ])
        ];
    }

    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:users,email']
        ];
    }

    public function onFailure(Failure ...$failure)
    {

    }

    // public function onError(Throwable $error)
    // {
    //     return $error;
    // }
}
