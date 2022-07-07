<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    public $table = "Admin";
    public $primaryKey = "id";
    public  $incrementing = true;
    public  $keyType = "int";
    public  $timestamps = false;
}
