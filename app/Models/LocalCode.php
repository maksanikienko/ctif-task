<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalCode extends Model
{
    use HasFactory;
    protected $table = 'local_codes';
    protected $fillable = ['cdc','name','parent_cdc'];
}
