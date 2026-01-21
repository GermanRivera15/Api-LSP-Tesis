<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sign;
use Illuminate\Support\Facades\DB;

class SignController extends Controller
{
    public function ListSign()
    {
        $consulta = Sign::all();
        return $consulta;
    }

    public function ListSignForCategory($TypeCategory)
    {
        $data=array();
        try
        {
          $consulta = Sign::select('sign.Code','sign.Title', 'sign.Description',
          'sign.UrlImage')
          ->join('category', 'category.Code', 'sign.CodeCategory')
          ->where('category.Type', '=', $TypeCategory)
          ->where('sign.Vigente', '=', 1)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function ListSignForCode($Code)
    {
      $data=array();
        try
        {
          $consulta = Sign::select('sign.Code','sign.Title','sign.Description',
          'sign.UrlImage','sign.CodeCategory','sign.Vigente')
          ->where('sign.Code', '=', $Code)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function AddSign(Request $request)
    {
        $consulta = new Sign();
        $consulta->Title = $request->Title;
        $consulta->Description = $request->Description;
        $consulta->UrlImage = $request->UrlImage;
        $consulta->CodeCategory = $request->CodeCategory;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }
    
    public function UpdateSign(Request $request, $Code)
    {
        $consulta = Sign::findOrFail($request->Code);
        $consulta->Title = $request->Title;
        $consulta->Description = $request->Description;
        $consulta->UrlImage = $request->UrlImage;
        $consulta->CodeCategory = $request->CodeCategory;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

    public function UpdateVigenteSign(Request $request, $Code)
    {
        $consulta = Sign::findOrFail($request->Code);
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

    public function ListSignForManageCategory($TypeCategory)
    {
        $data=array();
        try
        {
          $consulta = Sign::select('sign.Code','sign.Title', 'sign.Description',
          'sign.UrlImage','sign.Vigente')
          ->join('category', 'category.Code', 'sign.CodeCategory')
          ->where('category.Type', '=', $TypeCategory)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }
    
}