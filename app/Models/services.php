<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $fillable = [
        'Titel',
        'description',
        'image',
        'price',
        'Finish',
        'user_id',
        'category_id',
        'user_id'
       
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(categories::class);
    }


}
