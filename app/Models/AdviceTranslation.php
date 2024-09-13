<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdviceTranslation extends Model
{
    use HasFactory;
    protected $table = "advice_translations";
    protected $guarded = ["id"];
}
