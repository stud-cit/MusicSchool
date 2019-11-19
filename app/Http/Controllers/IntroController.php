<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intro;

class IntroController extends Controller
{
    protected $introStorage = "site-files/";

    public function getIntro()
    {
        $data = Intro::get();
        return response()->json($data);
    }
}
