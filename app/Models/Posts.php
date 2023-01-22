<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table ="posts";
    protected $fillable=['id','title','image','text'];


    public function users(){
     return $this->belongsTo('App\Models\User','user_id');
    }
}
