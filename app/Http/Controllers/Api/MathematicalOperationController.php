<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MathematicalOperation;

class MathematicalOperationController extends Controller
{
    public function ListMathematicalOperationsForType($Type)
    {
        $data=array();
        try
        {
          $consulta = MathematicalOperation::select('mathematical_operation.Code', 'mathematical_operation.Operation',
          'mathematical_operation.Answer', 'mathematical_operation.UrlImageOperation', 'mathematical_operation.Vigente')
          ->join('type_operation', 'type_operation.Code', 'mathematical_operation.CodeTypeOperation')
          ->where('type_operation.Type', '=', $Type)
          ->where('mathematical_operation.Vigente', '=', 1)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function ListManageMathematicalOperationsForType($Type)
    {
        $data=array();
        try
        {
          $consulta = MathematicalOperation::select('mathematical_operation.Code', 'mathematical_operation.Operation',
          'mathematical_operation.Answer', 'mathematical_operation.UrlImageOperation', 'mathematical_operation.Vigente')
          ->join('type_operation', 'type_operation.Code', 'mathematical_operation.CodeTypeOperation')
          ->where('type_operation.Type', '=', $Type)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function ShowMathematicalOperationForCode($Code)
    {
      $data=array();
        try
        {
          $consulta = MathematicalOperation::select('mathematical_operation.Code', 'mathematical_operation.Operation',
          'mathematical_operation.Answer', 'mathematical_operation.UrlImageOperation', 'mathematical_operation.CodeTypeOperation',
          'mathematical_operation.Vigente')
          ->where('mathematical_operation.Code', '=', $Code)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function AddMathematicalOperation(Request $request)
    {
        $consulta = new MathematicalOperation();
        $consulta->Operation = $request->Operation;
        $consulta->Answer = $request->Answer;
        $consulta->UrlImageOperation = $request->UrlImageOperation;
        $consulta->CodeTypeOperation = $request->CodeTypeOperation;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

    public function UpdateMathematicalOperation(Request $request, $Code)
    {
        $consulta = MathematicalOperation::findOrFail($request->Code);
        $consulta->Operation = $request->Operation;
        $consulta->Answer = $request->Answer;
        $consulta->UrlImageOperation = $request->UrlImageOperation;
        $consulta->CodeTypeOperation = $request->CodeTypeOperation;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
        return $consulta;
    }

    public function UpdateVigenteMathematicalOperation(Request $request, $Code)
    {
        $consulta = MathematicalOperation::findOrFail($request->Code);
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

}