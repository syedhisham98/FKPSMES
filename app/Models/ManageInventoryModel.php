<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageInventoryModel extends Model
{
    use HasFactory;
    public $table="Inventory";
    public $timestamps=false;
}
