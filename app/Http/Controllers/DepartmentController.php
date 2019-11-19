<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function getDepartments()
    {
        $data = DB::select('select * from departments');
        return response()->json(['departments' => $data]);
    }

    public function getTeachers($id)
    {
        $data = Departments::with('teachers')->where('departments_id', '=', $id)->get();
        return response()->json($data);
    }

    public function getInstruments($id)
    {
        $data = Departments::with('instruments')->where('departments_id', '=', $id)->get();
        return response()->json($data);
    }
}
