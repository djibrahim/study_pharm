<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Answer extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['response','is_correct','question_id'];

    public function question(){
        return $this->belongsTo('App\Models\Question','question_id');
    }
}
