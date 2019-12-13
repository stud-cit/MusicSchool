<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achieve extends Model
{
    protected $table = 'achieve';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'text',
        'date',
        'photo'
    ];
}
