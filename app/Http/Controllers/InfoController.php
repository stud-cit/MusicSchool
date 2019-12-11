<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    function getInfo() {
        $data = Info::first();
        return response()->json($data);
    }

    function updateInfo(Request $request) {
        Info::where("id", 1)->update([$request->column => $request->value]);
    }
}