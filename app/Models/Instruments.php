<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruments extends Model
{
    protected $table = 'instruments';
    protected $primaryKey = 'instruments_id';

    protected $fillable = [
        'title',
        'text',
        'photo'
    ];

    public function app()
    {
        return $this->belongsTo('App\Models\Departments', 'departments_id');
    }
}
