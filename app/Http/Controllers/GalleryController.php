<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Intervention\Image\ImageManagerStatic as Image;

class GalleryController extends Controller
{
    protected $publicStorage = '/user-file/gallery/';

    function getFile() {
        $data = Gallery::get();
        return response()->json($data);
    }
    function postFile(Request $request) {
        $uploadedFiles = $request->pics;
        if(isset($request->pics)) {
            $response = [];
            foreach ($uploadedFiles as $file) {
                $foto = new Gallery;
                $name = time().'-'.$file->getClientOriginalName();
                $file->move(public_path().$this->publicStorage, $name);
                $foto->file = $name;
                $foto->type = $request->type;
                $foto->save();
                $img = Image::make(public_path().$this->publicStorage.$name)->encode('jpg', 75);
                $img->resize(null, 800, function ($constraint) {
                    $constraint->aspectRatio();
                  })->save(public_path().$this->publicStorage.$name, 50);
                array_push($response, $foto);
            }
            return response()->json($response);
        } else {
            $foto = new Gallery;
            $foto->file = $request->file;
            $foto->type = $request->type;
            $foto->save();
            return response()->json($foto);
        } 
    }
    function deleteFile(Request $request) {
        var_dump($request['files']);
        foreach($request['files'] as $key => $value) {
            Gallery::find($value['id'])->delete();
            if($value['type'] == 'img') {
                unlink(public_path($this->publicStorage.$value['file']));
            }
        }
    }
}
