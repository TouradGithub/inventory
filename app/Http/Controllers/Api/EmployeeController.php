<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image As Image;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
       $employee = Employee::all();
       return response()->json($employee);
    }



    public function store(Request $request)
    {
        $validateData = $request->validate([
         'name' => 'required|unique:employees|max:255',
         'email' => 'required',
         'phone' => 'required|unique:employees',
        ]);

      if ($request->photo) {
         $position = strpos($request->photo, ';');
         $sub = substr($request->photo, 0, $position);
         $ext = explode('/', $sub)[1];

         $name = time().".".$ext;
         $img = Image::make($request->photo)->resize(240,200);
         $upload_path = 'backend/employee/';
         $image_url = $upload_path.$name;
         $img->save($image_url);

         $employee = new Employee;
         $employee->name = $request->name;
         $employee->email = $request->email;
         $employee->phone = $request->phone;
         $employee->sallery = $request->sallery;
         $employee->address = $request->address;
         $employee->nid = $request->nid;
         $employee->joining_date = $request->joining_date;
         $employee->photo = $image_url;
         $employee->save();
     }else{
        $employee = new Employee;
         $employee->name = $request->name;
         $employee->email = $request->email;
         $employee->phone = $request->phone;
         $employee->sallery = $request->sallery;
         $employee->address = $request->address;
         $employee->nid = $request->nid;
         $employee->joining_date = $request->joining_date;

         $employee->save();

     }


    }


    public function show($id)
    {
       $employee = DB::table('employees')->where('id',$id)->first();
       return response()->json($employee);
    }




    public function update(Request $request, $id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['sallery'] = $request->sallery;
        $data['address'] = $request->address;
        $data['nid'] = $request->nid;
        $data['joining_date'] = $request->joining_date;
        $image = $request->newphoto;

        if ($image) {
         $position = strpos($image, ';');
         $sub = substr($image, 0, $position);
         $ext = explode('/', $sub)[1];

         $name = time().".".$ext;
         $img = Image::make($image)->resize(240,200);
         $upload_path = 'backend/employee/';
         $image_url = $upload_path.$name;
         $success = $img->save($image_url);

         if ($success) {
            $data['photo'] = $image_url;
            $img = DB::table('employees')->where('id',$id)->first();
            $image_path = $img->photo;
            $done = unlink($image_path);
            $user  = DB::table('employees')->where('id',$id)->update($data);
         }

        }else{
            $oldphoto = $request->photo;
            $data['photo'] = $oldphoto;
            $user = DB::table('employees')->where('id',$id)->update($data);
        }

    }


    public function destroy($id)
    {
       $employee = DB::table('employees')->where('id',$id)->first();
       $photo = $employee->photo;
       if ($photo) {
         unlink($photo);
         DB::table('employees')->where('id',$id)->delete();
       }else{
        DB::table('employees')->where('id',$id)->delete();
       }
    }
}
