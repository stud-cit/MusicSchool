<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $table = 'intro';
    protected $primaryKey = 'intro_id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'block1',
        'block2',
        'block3',
        'bg',
        'info',
        'photo'
    ];

    protected $guarded = ['intro_id'];
}
