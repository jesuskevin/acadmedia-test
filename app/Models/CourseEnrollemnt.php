<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseEnrollemnt extends Model
{
    protected $table = "course_enrollment";

    protected $fillable = [
        'course_id',
        'enrollemnt_id',
    ];
}
