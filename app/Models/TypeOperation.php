<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOperation extends Model
{
    use HasFactory;
    protected $table = 'type_operation';
    protected $fillable = ['Code','Type','UrlImage','Vigente'];
    public $primaryKey = 'Code';
    public $timestamps = false;
}
