<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intro;

class IntroController extends Controller
{
    protected $publicStorage = "site-files/";

    public function pageIntro()
    {	
        return view('admin.intro');
    }

    public function getIntro()
    {
        $data = Intro::get();
        return response()->json($data);
    }

    public function postIntro(Request $request)
    {
        $intro = new Intro;

        $intro->block1 = $intro->introBlock1;
        $intro->block2 = $intro->introBlock2;
        $intro->block3 = $intro->introBlock3;

        if($request->hasFile('bg')) {
            $file = $request->bg;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $intro->bg = $this->publicStorage.$name;
        }
        $intro->info = $intro->introInfo;

        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $intro->photo = $this->publicStorage.$name;
        }
        $intro->save();
    }

    public function updateIntro(Request $request, $id)
    {
        $intro = Intro::find($id);

        $intro->block1 = $intro->introBlock1;
        $intro->block2 = $intro->introBlock2;
        $intro->block3 = $intro->introBlock3;

        if($request->hasFile('bg')) {
            $file = $request->bg;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $intro->bg = $this->publicStorage.$name;
        }
        $intro->info = $intro->introInfo;

        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $intro->photo = $this->publicStorage.$name;
        }
        $intro->save();
    }

    public function deleteIntro($id)
    {
        $intro = Intro::find($id);
        if($intro->bg != ''){
            unlink(public_path($intro->bg));
        }
        if($intro->photo != ''){
            unlink(public_path($intro->photo));
        }
        $intro->delete();
    }
}
