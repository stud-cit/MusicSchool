<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    protected $introStorage = "site-files/";

    public function getInfo()
    {
        $data = Info::get();
        return response()->json($data);
    }
}
