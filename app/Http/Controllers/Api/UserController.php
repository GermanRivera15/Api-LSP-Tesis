<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function ListUsers()
    {
        $consulta = User::all();
        return $consulta;
    }
    
    public function AddUser(Request $request)
    {
        $consulta = new User();
        $consulta->Name = $request->Name;
        $consulta->Email = $request->Email;
        $consulta->Rol = $request->Rol;
        $consulta->Vigente = $request->Vigente;

        $consulta->save();
    }

    public function ShowUser($Email)
    {
      $data=array();
        try
        {
          $consulta = User::select('*')
          ->distinct()
          ->where('user.Email', '=', $Email)
          ->get();
          return response($consulta);
        }
        catch (\Exception $ex) 
        {
            $data = $ex->getMessage();
            return response($data, 400);
        }
    }

    public function ShowUserAdmin($Email)
    {
      $data=array();
        try
        {
          $consulta = User::select('*')
          ->distinct()
          ->where('user.Email', '=', $Email)
          ->where('user.Rol', '=', 'Administrador')
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