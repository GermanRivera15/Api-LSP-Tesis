<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dictionary;

class DictionaryController extends Controller
{
    public function ListDictionaries()
    {
        $consulta = Dictionary::all();
        return $consulta;
    }

    public function ListDictionaryVigentes()
    {
        $data=array();
        try
        {
          $consulta = Dictionary::select('*')
          ->where('dictionary.Vigente', '=', 1)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function ListDictionaryForCode($Code)
    {
        $consulta = Dictionary::find($Code);
        return $consulta;
    }
    
    public function AddDictionary(Request $request)
    {
        $consulta = new Dictionary();
        $consulta->Country = $request->Country;
        $consulta->CodeUser = $request->CodeUser;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

    public function UpdateDictionary(Request $request, $Code)
    {
        $consulta = Dictionary::findOrFail($request->Code);
        $consulta->Country = $request->Country;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
        return $consulta;
    }
}
