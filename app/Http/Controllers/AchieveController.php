<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achieve;

class AchieveController extends Controller
{
    protected $publicStorageAchieve = "/user-file/achieve/";
    protected $defaultPhoto = "/img/empty.png";

    function getAchieve() {
        $data = Achieve::get();
        return response()->json($data);
    }

    function getAchieveId($id) {
        $data = Achieve::find($id);
        return response()->json($data);
    }

    function postAchieve(Request $request) {
        $achieve = new Achieve;

        $this->validate($request, ['filenames.*' => 'mimes:jpeg']);

        if($request->file('photo')) {
            $name = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path() . $this->publicStorageAchieve, $name);
            $achieve->photo = $this->publicStorageAchieve . $name;
        } else {
            $achieve->photo = $this->defaultPhoto;
        }

        $achieve->title = $request->title;
        $achieve->text = $request->text;
        $achieve->date = $request->date;
        $achieve->save();
        return response()->json($achieve);
    }

    function updateAchieve(Request $request, $id) {
        $achieve = Achieve::find($id);

        $this->validate($request, ['filenames.*' => 'mimes:jpeg']);

        if($request->file('photo') || $achieve->photo == $this->defaultPhoto) {
            $name = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path() . $this->publicStorageAchieve, $name);
            $achieve->photo = $this->publicStorageAchieve . $name;
        }

        $achieve->title = $request->title;
        $achieve->text = $request->text;
        $achieve->date = $request->date;
        $achieve->save();
        return response('ok', 200);
    }

    function deleteAchieve($id) {
        $achieve = Achieve::find($id);
        if($achieve->photo != $this->defaultPhoto) {
            unlink(public_path($achieve->photo));
        }
        $achieve->delete();
        return response('ok', 200);
    }
}
