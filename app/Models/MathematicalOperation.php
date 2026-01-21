<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathematicalOperation extends Model
{
    use HasFactory;
    protected $table = 'mathematical_operation';
    protected $fillable = ['Code','Operation','Answer','UrlImageOperation','CodeTypeOperation','Vigente'];
    public $primaryKey = 'Code';
    public $timestamps = false;
}
