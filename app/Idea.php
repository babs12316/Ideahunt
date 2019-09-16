<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public $timestamps = true;
    protected $fillable = [ 'id','title','description','likes','updated_at', 'created_at']; 
}
