<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = "status";
    
    protected $fillable = [
        'name',
    ];   
    // Colcoca o Atributo name em maiusulo
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtoupper($value);
    // }    
}
