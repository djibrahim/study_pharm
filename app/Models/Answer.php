<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Answer extends Model implements  HasMedia
{
    use HasFactory,SoftDeletes,InteractsWithMedia;

    protected $fillable=['response','is_correct','question_id'];

    public function question(){
        return $this->belongsTo('App\Models\Question','question_id');
    }
}
