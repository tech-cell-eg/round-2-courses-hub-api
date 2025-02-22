<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'course_description',
        'what_will_i_learn_from_this_course',
        'category_id',
        'language',
        'curriculum',  // JSON string
        'skill_level',
        'price',
        'course_day',  // JSON string
        'start_time',
        'end_time',
        'enrolled_number',
        'instructor_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_course', 'course_id', 'student_id')
            ->withTimestamps();
    }

}
