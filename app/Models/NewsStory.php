<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsStory extends Model
{
    protected $table = 'news_story';
    protected $primaryKey = 'id';
    public const NEWS = 'news';
    public const STORY = 'story';
    public const ACHIEVE = 'achieve';

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany('App\Models\Images', 'id');
    }

    public function scopeNews($query) {
        return $query->where('type', self::NEWS);
    }

    public function scopeStory($query) {
        return $query->where('type', self::STORY);
    }

    public function scopeAchieve($query) {
        return $query->where('type', self::ACHIEVE);
    }
}
