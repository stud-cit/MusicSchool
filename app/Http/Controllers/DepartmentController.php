<?php

namespace App\Http\Controllers;

use App\Models\Instruments;
use App\Models\Teachers;
use Illuminate\Http\Request;
use App\Models\Departments;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class DepartmentController extends Controller
{
    protected $publicStorageTeachers = "/user-file/teachers/";
    protected $publicStorageInstruments = "/user-file/instruments/";
    protected $publicStorageDepartments = "/user-file/departments/";
    protected $defaultPhoto = "/img/empty.png";

    // Відділи

    public function getDepartments()
    {
        $departments = Departments::with('teachers', 'instruments')->get();
        return response()->json($departments);
    }
    public function getDepartmentsId($id)
    {
        $data = Departments::find($id);
        return response()->json($data);
    }
    public function postDepartments(Request $request)
    {
        $departments = new Departments;

        $this->validate($request, ['filenames.*' => 'mimes:jpeg']);

        if($request->file('img')) {
            $name = date('mdY-His-') . uniqid() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->file('img')->move(public_path() . $this->publicStorageDepartments, $name);
            $departments->img = $this->publicStorageDepartments . $name;
            $img = Image::make(public_path().$this->publicStorageDepartments . '/'.$name)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() . $this->publicStorageDepartments. '/' . $name, 50);
        } else {
            $departments->img = $this->defaultPhoto;
        }

        $departments->name_department = $request->name_department;
        $departments->departments_info = htmlspecialchars($request->departments_info);
        $departments->save();
        return response()->json($departments);
    }
    public function updateDepartments(Request $request, $id)
    {
        $departments = Departments::find($id);

        $this->validate($request, ['filenames.*' => 'mimes:jpeg']);

        if($request->file('img')) {
            unlink(public_path($departments->img));
            $name = date('mdY-His-') . uniqid() . '.' . $request->file('img')->getClientOriginalExtension();
            $request->file('img')->move(public_path() . $this->publicStorageDepartments, $name);
            $departments->img = $this->publicStorageDepartments . $name;
            $img = Image::make(public_path().$this->publicStorageDepartments.$name)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() . $this->publicStorageDepartments. $name, 50);
        }

        $departments->name_department = $request->name_department;
        $departments->departments_info = htmlspecialchars($request->departments_info);
        $departments->save();
        return response('ok', 200);
    }
    public function deleteDepartments($id)
    {
        $departments = Departments::find($id);
        if($departments->img != $this->defaultPhoto) {
            unlink(public_path($departments->img));
        }
        $departments->delete();
        return response('ok', 200);
    }

    // Учителя
    function getTeachers() {
        $data = Teachers::with('department')->get();
        return response()->json($data);
    }

    function getTeacherId($id) {
        $data = Teachers::with('department')->where('teachers_id', $id)->first();
        return response()->json($data);
    }

    function getTeacherDepartmentId($id) {
        $data = Teachers::with('department')->where('departments_id', $id)->get();
        return response()->json($data);
    }

    function postTeachers(Request $request) {
        $teachers = new Teachers;
        $teachers->departments_id = $request->departments_id;
        $teachers->teacher_surname = $request->teacher_surname;
        $teachers->teacher_name = $request->teacher_name;
        $teachers->teacher_patronymic = $request->teacher_patronymic;
        $teachers->teacher_info = $request->teacher_info;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = date('mdY-His-') . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . $this->publicStorageTeachers. $teachers->id. '/', $name);
            $teachers->photo = $this->publicStorageTeachers. $teachers->id.$name;
            $img = Image::make(public_path().$this->publicStorageTeachers. $teachers->id . '/'.$name)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() . $this->publicStorageTeachers . $teachers->id . '/' . $name, 50);

        } else {
            $teachers->photo = $this->defaultPhoto;
        }
        $teachers->save();
        return response()->json($teachers);
    }

    function updateTeachers(Request $request, $id) {
        $teachers = Teachers::find($id);
        $teachers->teacher_surname = $request->teacher_surname;
        $teachers->teacher_name = $request->teacher_name;
        $teachers->teacher_patronymic = $request->teacher_patronymic;
        $teachers->teacher_info = $request->teacher_info;
        $teachers->departments_id = $request->departments_id;
        if($request->hasFile('photo')) {
            unlink(public_path($teachers->photo));
            $file = $request->photo;
            $name = date('mdY-His-') . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . $this->publicStorageTeachers. $teachers->id, $name);
            $teachers->photo = $this->publicStorageTeachers. $teachers->id. '/'.$name;
            $img = Image::make(public_path().$this->publicStorageTeachers. $teachers->id . '/'.$name)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() . $this->publicStorageTeachers . $teachers->id . '/' . $name, 50);
        }
        $teachers->save();  
    }
    function deleteTeachers($id) {
        $teachers = Teachers::find($id);
        if($teachers->photo != $this->defaultPhoto) {
            unlink(public_path($teachers->photo));
        }
        $teachers->delete();
    }

    // Інструменти

    function getInstrumentId($id) {
        $data = Instruments::with('department')->find($id);
        return response()->json($data);
    }

    function getInstrumentDepartmentId($id) {
        $data = Instruments::with('department')->where('departments_id', $id)->get();
        return response()->json($data);
    }

    function getInstruments() {
        $data = Instruments::with('department')->get();
        return response()->json($data);
    }

    function postInstruments(Request $request) {
        $instruments = new Instruments;
        $instruments->departments_id = $request->departments_id;
        $instruments->name_instruments = $request->name_instruments;
        $instruments->instruments_info = $request->instruments_info;
        if($request->hasFile('photo')) {
            $file = $request->photo;
            $name = date('mdY-His-') . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . $this->publicStorageInstruments, $name);
            $instruments->photo = $this->publicStorageInstruments.$name;
            $img = Image::make(public_path().$this->publicStorageInstruments.$name)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() . $this->publicStorageInstruments. $name, 50);
        } else {
            $instruments->photo = $this->defaultPhoto;
        }
        $instruments->save();
        $instruments->department = Departments::find($instruments->departments_id);
        return response()->json($instruments);
    }

    function updateInstruments(Request $request, $id) {
        $instruments = Instruments::find($id);
        $instruments->name_instruments = $request->name_instruments;
        $instruments->instruments_info = $request->instruments_info;
        $instruments->departments_id = $request->departments_id;
        if($request->hasFile('photo')) {
            unlink(public_path($instruments->photo));
            $file = $request->photo;
            $name = date('mdY-His-') . uniqid(). '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . $this->publicStorageInstruments, $name);
            $img = Image::make(public_path().$this->publicStorageInstruments.$name)->encode('jpg', 75);
            $img->resize(null, 800, function ($constraint) {
                $constraint->aspectRatio();
              })->save(public_path() . $this->publicStorageInstruments. $name, 50);
            $instruments->photo = $this->publicStorageInstruments.$name;
        }
        $instruments->save();
        return response('ok', 200);
    }

    function deleteInstruments($id) {
        $instruments = Instruments::find($id);
        if($instruments->photo != $this->defaultPhoto) {
            unlink(public_path($instruments->photo));
        }
        $instruments->delete();
        return response('ok', 200);
    }
}
