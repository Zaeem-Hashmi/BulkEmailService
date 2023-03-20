<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    use HasFactory;
    public static function allData(){
        return EmailList::all();
    }
    protected $fillable = [
        'list_name'
    ];
    function email()
    {
        return $this->hasMany(Email::class);
    }
}
