<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
    use HasFactory;
    public $table = 'visitors';
    public $primaryKey = 'id';
    public $timestamps = false;
    public $increamenting = true;
    public $keyType = 'int';
}
