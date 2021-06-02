<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Articulo extends Model
{
    use HasFactory;
    public static function getallArticulos(){
        $result = DB::table('articulos')
        ->select('id','codigo','descripcion','cantidad','precio')
        ->get()->toArray();
        return $result;
    }
}
