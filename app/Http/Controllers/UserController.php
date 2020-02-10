<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    function getUserId($id) {
        $data = User::find($id);
        return response()->json($data);
    }
    function updateUser(Request $request, $id) {
        $model = User::find($id);
        $data = json_decode($request->data);
        foreach($data as $key => $value) {
            if($key != "password") {
                $model->$key = $value;
            }
        }
        if($data->password != "") {
            $model->password = Hash::make($data->password);
        }
        $model->save();
        return response('ok', 200);
    }
}
