<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return [
            'student_id', 'firstname', 'middlename','lastname','email', 'contact', 'gender', 'birthdate', 'birthplace', 'address'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // GET THE DATA THAT WILL RETURN IN EXCEL
        return Student::all(
            'student_id', 'firstname', 'middlename','lastname','email', 'contact', 'gender', 'birthdate', 'birthplace', 'address'
        );

        // return collect(Student::getStudents());
    }
}
