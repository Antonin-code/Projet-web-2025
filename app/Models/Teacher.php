<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table =   'users_schools';
    protected $fillable = ['user_id','school_id','role'];
    public $timestamps = true;

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }


}
