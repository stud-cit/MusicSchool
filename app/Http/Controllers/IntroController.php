<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Intro;
use Intervention\Image\ImageManagerStatic as Image;

class IntroController extends Controller
{
    protected $publicStorage = "site-files/";

    public function getIntro()
    {
        $data = Intro::first();
        return response()->json($data);
    }

    public function postIntro(Request $request)
    {
        $res = DB::update('update '.$request->table.' set '.$request->row.' = "'.htmlspecialchars($request->value).'" where intro_id = 1');
    }
    public function postIntroFile(Request $request)
    {
        if($request->hasFile('bg')) {
            $file = $request->bg->getClientOriginalName();
            $directory = '/' . $request->type;
            $request->bg->move(public_path() . $directory, $file);
            $img = Image::make(public_path().'/'.$this->publicStorage. '/'. $file)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() .'/'.$this->publicStorage.'/'. $file, 50);
            $res = DB::update('update ' . $request->table . ' set ' . $request->row . ' = "' . $directory . '/' . $file . '" where intro_id = 1');
        }

        if($request->hasFile('photo')) {
            $file = $request->photo->getClientOriginalName();
            $directory = '/' . $request->type;
            $request->photo->move(public_path() . $directory, $file);
            $img = Image::make(public_path().'/'.$this->publicStorage. '/'. $file)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() .'/'.$this->publicStorage.'/'. $file, 50);
            $res = DB::update('update ' . $request->table . ' set ' . $request->row . ' = "' . $directory . '/' . $file . '" where intro_id = 1');
        }
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
