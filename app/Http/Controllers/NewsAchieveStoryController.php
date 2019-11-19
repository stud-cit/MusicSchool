<?php

namespace App\Http\Controllers;

use App\Models\NewsAchieveStory;
use Illuminate\Http\Request;

class NewsAchieveStoryController extends Controller
{
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
