<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    protected $fillable = [
        'admin_id', 
        'firstname', 
        'middlename',
        'lastname',
        'email', 
        'contact', 
        'gender', 
        'birthdate', 
        'birthplace', 
        'address',
        'age',
    ];
}
