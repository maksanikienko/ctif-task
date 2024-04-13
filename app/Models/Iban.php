<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iban extends Model
{
    use HasFactory;

    protected $table = 'ibans';
    protected $fillable = ['eco_code','location_code','trez_code','iban'];

}
