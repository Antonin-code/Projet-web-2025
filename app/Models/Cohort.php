<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    protected $table        = 'cohorts';
    protected $fillable     = ['school_id', 'name', 'description', 'start_date', 'end_date'];

    // mean that each instance of this model is associated with a single promotion (Cohort)
    public function cohort(){
        return $this->belongsTo('App\Models\Cohort');
    }
}
