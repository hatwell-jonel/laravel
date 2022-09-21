<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = ['student_id', 'firstname', 'middlename','lastname','email', 'contact', 'gender', 'birthdate', 'birthplace', 'address'];
}
