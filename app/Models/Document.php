<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $primaryKey = 'documents_id';
    public $incrementing = false;

    protected $fillable = [
        'text',
        'file'
    ];

    protected $guarded = ['documents_id'];
}
