<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesModel extends Model
{
    use HasFactory;
    public $table='services';
    public $primaryKey='id';
    public $keyType='int';
    public $timestamps=false;
    public $increamenting = true;
}
