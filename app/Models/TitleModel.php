<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitleModel extends Model
{
    use HasFactory;

    public $table="title";
    public $timestamps=false;
    protected $primaryKey = "titleID" ;
}
