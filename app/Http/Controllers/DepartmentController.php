<?php

namespace App\Http\Controllers;

use App\Models\Instruments;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    protected $publicStorage = "site-files/";

    // Відділи

    public function getDepartments()
    {
        $departments = DB::select('select * from departments');
        return response()->json($departments);
    }
    public function postDepartments(Request $request)
    {
        $departments = new Departments;
        $departments->name_department = $request->name_department;
        $departments->departments_info = $request->departments_info;
        $departments->save();
        return response()->json($departments);
    }
    public function updateDepartments(Request $request, $id)
    {
        $departments = Departments::find($id);

        $departments->name_department = $request->name_department;
        $departments->departments_info = $request->departments_info;
        $departments->save();
    }
    public function deleteDepartments($id)
    {
        $departments = Departments::find($id);
        $departments->delete();
    }

    // Учителя
    public function getTeachers()
    {
        $data = Teachers::get();
        return response()->json($data);
    }

    public function getTeacherId($id)
    {
        $data = Teachers::with('department')->find($id);
        return response()->json($data);
    }
    public function getTeachers()
    {
        $data = Teachers::with('department')->get();
        return response()->json($data);
    }
    public function postTeachers(Request $request)
    {
        $teachers = new Teachers;
        $teachers->teacher_name = $request->teachersName;
        $teachers->teacher_info = $request->teachersInfo;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $teachers->photo = $this->publicStorage.$name;
        }
        $teachers->save();
    }
    public function updateTeachers(Request $request, $id)
    {
        $teachers = Teachers::find($id);

        $teachers->teacher_name = $request->teachersName;
        $teachers->teacher_info = $request->teachersInfo;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $teachers->photo = $this->publicStorage.$name;
        }
        $teachers->save();
    }
    public function deleteTeachers($id)
    {
        $teachers = Teachers::find($id);
        if ($teachers->photo != '') {
            unlink(public_path($teachers->photo));
        }
        $teachers->delete();
    }

    // Інструменти

    public function getInstrumentId($id)
    {
        $data = Instruments::with('department')->find($id);
        return response()->json($data);
    }
    public function getInstruments()
    {
        $data = Instruments::with('department')->get();
        return response()->json($data);
    }
    public function postInstruments(Request $request)
    {
        $instruments = new Instruments;

        $instruments->name_instruments = $request->instrumentsName;
        $instruments->instruments_info = $request->instrumentsInfo;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $instruments->photo = $this->publicStorage.$name;
        }
        $instruments->save();
    }
    public function updateInstruments(Request $request, $id)
    {
        $instruments = Instruments::find($id);

        $instruments->name_instruments = $request->instrumentsName;
        $instruments->instruments_info = $request->instrumentsInfo;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorage, $name);
            $instruments->photo = $this->publicStorage.$name;
        }
        $instruments->save();
    }
    public function deleteInstruments($id)
    {
        $instruments = Instruments::find($id);
        if ($instruments->photo != '') {
            unlink(public_path($instruments->photo));
        }
        $instruments->delete();
    }
}
