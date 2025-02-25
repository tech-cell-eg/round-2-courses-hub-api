<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Instructor extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'instructors';
//    protected $guard = 'instructors';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'birth_date',
        'nationality',
        'country',
        'city',
        'first_address',
        'second_address',
        'zip_code',
        'choose_file',
        'password',
        'intended_study_field',
        'degree-sought',
        'begin-studies',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
