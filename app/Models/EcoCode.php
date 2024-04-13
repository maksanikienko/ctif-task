<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcoCode extends Model
{
    use HasFactory;

    protected $table = 'eco_codes';
    protected $fillable = ['code','label'];
}
