<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\NewsStory;

class InfoController extends Controller
{
    function getMainInfo() {
        $lastNew = NewsStory::with('images')->news()->orderBy('date', 'DESC')->first();
        $info = Info::first();
        return response()->json([
            'news' => $lastNew,
            'info' => $info
        ]);
    }

    function getInfo() {
        $data = Info::first();
        return response()->json($data);
    }

    function updateInfo(Request $request) {
        Info::where("id", 1)->update([$request->column => $request->value]);
    }
}