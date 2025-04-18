<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSchool extends Model
{
    protected $table        = 'users_schools';
    protected $fillable     = ['user_id', 'school_id', 'cohort_id' ,'role', 'active'];


    // This method retrieves the user corresponding to the 'user_id' stored in the column 'user_id'
    // It returns the first user found where the ID matches the 'user_id' of the current instance
    public function user(){
        return User::where('id',$this->user_id)->first();
    }
}
