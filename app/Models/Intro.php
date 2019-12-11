<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $table = 'intro';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'block1',
        'block2',
        'block2',
        'bg',
        'info',
        'photo'
    ];

    protected $guarded = ['id'];
}
