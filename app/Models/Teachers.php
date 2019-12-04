<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    protected $table = 'teachers';
    protected $primaryKey = 'teachers_id';

    public function department()
    {
        return $this->belongsTo('App\Models\Departments', 'departments_id');
    }
}
