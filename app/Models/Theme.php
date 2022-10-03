<?php

namespace App\Models;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $fillable = array('codeTheme','nom');
    public function projets()
    {
        return $this->hasMany(Projet::class);
    }
    
}
