<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table = 'departments';
    protected $primaryKey = 'departments_id';

    protected $fillable = [
        'title',
        'text'
    ];

    public function teachers()
    {
        return $this->hasMany('App\Models\Teachers', 'departments_id');
    }

    public function instruments()
    {
        return $this->hasMany('App\Models\Instruments', 'departments_id');
    }
}
