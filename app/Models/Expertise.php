<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    public function teach(){
        return $this->belongsTo(Teaching::class,'teach_id','id');
    }

    public function research(){
        return $this->belongsTo(Research::class,'research_id','id');
    }

    public function intel(){
        return $this->belongsTo(Intellectual::class,'int_id','id');
    }
}
