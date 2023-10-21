<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Module extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['name','description','year_id'];

    public function courses(){
        return $this->hasMany('App\Models\Module');
    }

    public function year(){
        return $this->belongsTo('App\Models\Year','year_id');
    }
}
