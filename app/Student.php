<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['student_id', 'firstname', 'middlename','lastname','email', 'contact', 'gender', 'birthdate', 'birthplace', 'address'];

    // Get student data from DB to be passed in excel 
    public function getStudents(){
        $records = DB::table('students')->select('student_id', 'firstname', 'middlename','lastname','email', 'contact', 'gender', 'birthdate', 'birthplace', 'address')->get()->toArray();
        return $records;
    }
}

