<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catgori_sup extends Model
{
    protected $fillable = [
        'category_name',
        'image',
        'category_id'
       
    ];
    // public function category(){
    //     return $this->belongsTo(categories::class);
    // }
}
