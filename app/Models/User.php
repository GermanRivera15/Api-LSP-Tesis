<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $fillable = ['Code','Name','Email','Rol','Vigente'];
    public $primaryKey = 'Code';
    public $timestamps = false;
}
