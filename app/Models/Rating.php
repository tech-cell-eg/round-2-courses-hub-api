<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable =
        [
            'user_id',
            'course_id',
            'rating',
            'review'
        ];

    public function student()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
