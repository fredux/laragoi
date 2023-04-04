<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $table = 'models';

    protected $fillable = ['name'];


    public function mark()
    {
        $this->belongsTo(Mark::class);
    }    
}
