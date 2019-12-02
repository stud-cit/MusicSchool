<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsAchieveStory extends Model
{
    protected $table = 'news_achieve_story';
    protected $primaryKey = 'nas_id';
    public const NEWS = 'news';
    public const ACHIEVE = 'achieve';
    public const STORY = 'story';

    protected $guarded = ['nas_id'];

    public function images()
    {
        return $this->hasMany('App\Models\Images', 'nas_id');
    }

    public function scopeNews($query) {
        return $query->where('type', self::NEWS);
    }

    public function scopeAchieve($query) {
        return $query->where('type', self::ACHIEVE);
    }

    public function scopeStory($query) {
        return $query->where('type', self::STORY);
    }
}
