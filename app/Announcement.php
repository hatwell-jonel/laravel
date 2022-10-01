<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement';
    protected $fillable = ['title', 'detail', 'image','start_date', 'end_date'];
}
