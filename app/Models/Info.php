<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'logo',
        'info_school',
        'video',
        'phone',
        'email',
        'address'
    ];

    protected $guarded = ['id'];
}
