<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['title','description','module_id'];

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }

    public function module(){
        return $this->belongsTo('App\Models\Module','module_id');
    }
}
