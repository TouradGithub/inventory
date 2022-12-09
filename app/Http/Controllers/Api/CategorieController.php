<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image As Image;
use App\Models\Categorie;
class CategorieController extends Controller
{
   
    public function index()
    {
        $category = Categorie::all();
        return response()->json($category);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
         'category_name' => 'required|unique:categories|max:255',
        ]);

         $category = new Categorie;
         $category->category_name = $request->category_name;
         
         $category->save();  
    }

   
    public function show($id)
    {
       $category = DB::table('categories')->where('id',$id)->first();
       return response()->json($category);
    }

  

    public function update(Request $request, $id)
    {
        $data = array();
        $data['category_name'] =  $request->category_name;
        DB::table('categories')->where('id',$id)->update($data);
    }

    public function destroy($id)
    {
       DB::table('categories')->where('id',$id)->delete();
    }
}
