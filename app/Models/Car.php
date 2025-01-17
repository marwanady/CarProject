<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table= "cars";
    protected $fillable=[
        'title',
        'content',
        'luggage',
        'dors',
        'passengers',
        'price',
        'image',
        'active',
    ];


    public function category(){
        return $this->belongsTo(Category::class);

        

    }

}
