<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAchieveStory;
use Illuminate\Support\Facades\DB;

class NewsAchieveStoryController extends Controller
{
    public function getNewsAchieveStory()
    {
        $data = DB::select('select * from news_achieve_story');
        return response()->json(['newsAchieveStory' => $data]);
    }

    public function getNews()
    {
        $data = NewsAchieveStory::with('images')
            ->news()
            ->get();
        return response()->json($data);
    }

    public function getAchieve()
    {
        $data = NewsAchieveStory::with('images')
            ->achieve()
            ->get();
        return response()->json($data);
    }

    public function getStory()
    {
        $data = NewsAchieveStory::with('images')
            ->story()
            ->get();
        return response()->json($data);
    }
}
