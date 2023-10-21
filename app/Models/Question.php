<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Question extends Model implements HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;

    protected $fillable=['title','emd','year','ratt','course_id'];

    public function answers(){
        return $this->hasMany('App\Models\Answer');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course','course_id');
    }
}
