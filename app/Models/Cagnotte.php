<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cagnotte extends Model
{
    protected $fillable = array('codeCagnotte','nom');
    use HasFactory;
}
