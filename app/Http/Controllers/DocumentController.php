<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    protected $introStorage = "site-files/";

    public function getIntro()
    {
        $data = Document::get();
        return response()->json($data);
    }
}
