<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'images_id';

    public function nas()
    {
        return $this->belongsTo('App\Models\NewsAchieveStory', 'nas_id');
    }
}
