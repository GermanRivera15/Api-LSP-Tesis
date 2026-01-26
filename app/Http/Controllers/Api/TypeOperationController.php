<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeOperation;

class TypeOperationController extends Controller
{
    public function ListTypeOperations()
    {
        $consulta = TypeOperation::all();
        return response()->json($consulta, 200);
    }

    public function ListTypeOperationVigentes()
    {
        $data=array();
        try
        {
          $consulta = TypeOperation::select('*')
          ->where('type_operation.Vigente', '=', 1)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function TypeOperationForCode($Code)
    {
      $data=array();
        try
        {
          $consulta = TypeOperation::select('type_operation.Code','type_operation.Type',
          'type_operation.UrlImage','type_operation.Vigente')
          ->where('type_operation.Code', '=', $Code)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function AddTypeOperation(Request $request)
    {
        $consulta = new TypeOperation();
        $consulta->Type = $request->Type;
        $consulta->UrlImage = $request->UrlImage;
        $consulta->CodeCategory = $request->CodeCategory;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

    public function UpdateTypeOperation(Request $request, $Code)
    {
        $consulta = TypeOperation::findOrFail($request->Code);
        $consulta->Type = $request->Type;
        $consulta->UrlImage = $request->UrlImage;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
        return $consulta;
    }

    public function UpdateVigenteTypeOperation(Request $request, $Code)
    {
        $consulta = TypeOperation::findOrFail($request->Code);
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }
}
