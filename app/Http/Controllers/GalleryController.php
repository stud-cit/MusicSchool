<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    protected $publicStorage = '/gallery';

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
        // $model = new Gallery();
        // $data = $request->all();
        // $response = $model->create($data);
        // return response()->json($response);
    }
    function deleteFile() {
        //
    }
}
