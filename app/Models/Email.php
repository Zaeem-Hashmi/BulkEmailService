<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email','company','telephone','list_id'
    ];
    function emailList(){
        return $this->belongsTo(EmailList::class,'list_id','id');
    }
}
