<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    //Definición nombre de la tabla
    protected $table = "person";

    //Definición de campos
    protected $fillable = [
        'name',
        'address',
        'phone'
    ];

}
