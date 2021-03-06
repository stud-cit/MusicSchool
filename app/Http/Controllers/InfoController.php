<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\PageInfo;
use App\Models\NewsStory;
use App\Models\SiteInfo;

class InfoController extends Controller
{

    protected $fileStorage = '/img/';

    function getMainInfo() {
        $lastStory = NewsStory::with('images')->story()->orderBy('date', 'DESC')->first();
        $info = Info::first();
        return response()->json([
            'story' => $lastStory,
            'info' => $info
        ]);
    }

    function getInfo() {
        $data = Info::first();
        return response()->json($data);
    }

    function getPageInfo() {
        $data = PageInfo::get();
        return response()->json($data);
    }

    function getPageInfoId($page) {
        $data = PageInfo::where('page', $page)->first();
        return response()->json($data);
    }

    function putPageInfo(Request $request) {
        PageInfo::where("page", $request->page)->update(['text' => $request->text, 'shirt_text' => $request->shirt_text, 'title' => $request->title]);
        return response('ok', 200);
    }

    function updateInfo(Request $request) {
        Info::where("id", 1)->update([$request->column => $request->value]);
    }

    function putLogo(Request $request) {
        $name = $this->fileStorage.uniqid().'.'.$request['logo']->getClientOriginalExtension();
        $request['logo']->move(public_path().$this->fileStorage, $name);
        Info::where("id", 1)->update(['logo' => $name]);
    }

    // Опис сайтів

    function getSiteInfo() {
        $data = SiteInfo::get();
        return response()->json($data);
    }

    function putSiteInfo(Request $request) {
        SiteInfo::where("site", $request->site)->update(['text' => $request->text]);
        return response('ok', 200);
    }
}
