<?php

namespace App\Models;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financement extends Model
{
    protected $fillable = array('codeFinancement','users_id','projet_id','owners_id','sommeFinancee','articles_id','facture');
    protected $casts =[
        'created_at' => 'datetime:d-M-Y',
        'codeFinancement' => 'datetime:d-M-Y'
    ];


    use HasFactory;

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id');
    }

}
