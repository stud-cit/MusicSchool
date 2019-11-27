<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    protected $publicStorage = "video/";

    public function getInfo()
    {
        $data = Info::get();
        return response()->json($data);
    }

    public function postInfo(Request $request)
    {
        $info = new Info;

        $info->info_school = $info->InfoSchool;
        $file = $request->infoVideo->store('public');
        $info->video = str_replace('public/', '', $file);
        $info->phone = $info->infoPhone;
        $info->email = $info->infoEmail;
        $info->address = $info->infoAddress;

        $info->save();
    }

    public function updateInfo(Request $request, $id)
    {
        $info = Info::find($id);

        $info->info_school = $info->InfoSchool;
        $file = $request->infoVideo->store('public');
        $info->video = str_replace('public/', '', $file);
        $info->phone = $info->infoPhone;
        $info->email = $info->infoEmail;
        $info->address = $info->infoAddress;

        $info->save();
    }

    public function deleteInfo($id)
    {
        $info = Info::find($id);
        if($info->video != ''){
            unlink(public_path($info->video));
        }

        $info->delete();
    }
}
