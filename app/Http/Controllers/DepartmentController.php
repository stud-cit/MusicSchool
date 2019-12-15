<?php

namespace App\Http\Controllers;

use App\Models\Instruments;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    protected $publicStorageTeachers = "/user-file/teachers/";
    protected $publicStorageInstruments = "/user-file/instruments/";
    protected $defaultPhoto = "/img/empty.png";

    // Відділи

    public function getDepartments()
    {
        $departments = Departments::with('teachers', 'instruments')->get();
        return response()->json($departments);
    }
    public function getDepartmentsId($id)
    {
        $data = Departments::with('department')->find($id);
        return response()->json($data);
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
        $data = Teachers::with('department')->get();
        return response()->json($data);
    }

    public function getTeacherId($id)
    {
        $data = Teachers::with('department')->where('departments_id', $id)->get();
        return response()->json($data);
    }
    public function postTeachers(Request $request)
    {
        $teachers = new Teachers;
        $teachers->departments_id = $request->departments_id; 
        $teachers->teacher_surname = $request->teacher_surname;
        $teachers->teacher_name = $request->teacher_name;
        $teachers->teacher_info = $request->teacher_info;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorageTeachers, $name);
            $teachers->photo = $this->publicStorageTeachers.$name;
        } else {
            $teachers->photo = $this->defaultPhoto;
        }
        $teachers->save();
    }
    public function updateTeachers(Request $request, $id)
    {
        $teachers = Teachers::find($id);
        $teachers->teacher_surname = $request->teacher_surname;
        $teachers->teacher_name = $request->teacher_name;
        $teachers->teacher_info = $request->teacher_info;
        if($request->file('photo') || $teachers->photo == $this->defaultPhoto) {
            $name = time() . '-' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path() . $this->publicStorageTeachers, $name);
            $teachers->photo = $this->publicStorageTeachers . $name;
        }
        $teachers->save();
    }
    public function deleteTeachers($id)
    {
        $teachers = Teachers::find($id);
        if($teachers->photo != $this->defaultPhoto) {
            unlink(public_path($teachers->photo));
        }
        $teachers->delete();
    }

    // Інструменти
    //вот оно where('departments_id', $id)->first(); или ->find($id)
    public function getBackendInstrumentId($id)
    {
        $data = Instruments::with('department')->find($id);
        return response()->json($data);
    }
    public function getFrontInstrumentId($id)
    {
        $data = Instruments::with('department')->where('departments_id', $id)->get();
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
        $instruments->departments_id = $request->departments_id; 
        $instruments->name_instruments = $request->name_instruments;
        $instruments->instruments_info = $request->instruments_info;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . $this->publicStorageInstruments, $name);
            $instruments->photo = $this->publicStorageInstruments.$name;
        } else {
            $instruments->photo = $this->defaultPhoto;
        }
        $instruments->save();
    }
    public function updateInstruments(Request $request, $id)
    {
        $instruments = Instruments::find($id);

        $instruments->name_instruments = $request->name_instruments;
        $instruments->instruments_info = $request->instruments_info;
        $instruments->departments_id = $request->departments_id;
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
        // if ($instruments->photo != '') {
        //     unlink(public_path($instruments->photo));
        // }
        $instruments->delete();
    }
}
