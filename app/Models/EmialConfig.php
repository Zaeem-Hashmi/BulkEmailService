<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmialConfig extends Model
{
    use HasFactory;
    public static function allData(){
        return EmialConfig::latest()->first();
    }
}
