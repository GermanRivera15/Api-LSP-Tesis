<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function ListCategories()
    {
        $consulta = Category::all();
        return response()->json($consulta, 200);
    }

    public function ListCategoriesVigentes()
    {
        $data=array();
        try
        {
          $consulta = Category::select('*')
          ->where('category.Vigente', '=', 1)
          ->where('category.Type', '!=', 'Operaciones Matemáticas')
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function CategoryForCode($Code)
    {
      $data=array();
        try
        {
          $consulta = Category::select('category.Code','category.Type',
          'category.UrlImage','category.CodeDictionary','category.Vigente')
          ->where('category.Code', '=', $Code)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function ListCategoriesForCodeDictionary($Code)
    {
      $data=array();
        try
        {
          $consulta = Category::select('category.Code','category.Type')
          ->distinct()        
          ->where('category.CodeDictionary', '=', $Code)
          ->where('category.Vigente', '=', 1)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function AddCategory(Request $request)
    {
        $consulta = new Category();
        $consulta->Type = $request->Type;
        $consulta->UrlImage = $request->UrlImage;
        $consulta->CodeDictionary = $request->CodeDictionary;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

    public function UpdateCategory(Request $request, $Code)
    {
        $consulta = Category::findOrFail($request->Code);
        $consulta->Type = $request->Type;
        $consulta->UrlImage = $request->UrlImage;
        $consulta->CodeDictionary = $request->CodeDictionary;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
        return $consulta;
    }

    public function UpdateVigenteCategory(Request $request, $Code)
    {
        $consulta = Category::findOrFail($request->Code);
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }
}
