<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Advice extends Model
{
    use HasFactory;
    protected $table = "advice";
    protected $guarded = ["id"];

    public static function createNew()
    {
        $advice = new Advice();
        $advice->save();

        return $advice->id;
    }
}
