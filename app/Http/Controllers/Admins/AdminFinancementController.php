<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Cagnotte;
use App\Models\Financement;
use App\Models\User;
use App\Models\Projet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AdminFinancementController extends Controller
{
    public function index()
    {
        //return Inertia::render('Admin/Dashboard');
        $financements = Financement::all();
        $users = User::all();
        return view('admin.financement.gestion-financement', ['financements' => $financements, 'users' => $users]);
    }

    public function edit($id)
    {
        $editfinancement= Financement::findOrFail($id);
        $projets = Projet::all();
        $users = User::all();
        $cagnottes = Cagnotte::all();
        
        return view('admin.financement.edit-financement', ['cagnottes'=>$cagnottes,'projets'=>$projets,'users'=>$users])
            ->with('editfinancement',$editfinancement);
        
    }

    public function update(Request $request, $id)
    {
        $update = Financement::findOrFail($id);
        $update->status = $request->input('status');
        $update->projet->cagnotte->somme = $request->input('somme');
        error_log($update->projet->cagnotte->somme."======================================");
        $update->update();
        $update->projet->cagnotte->update();

        return redirect('/admin/financements')->with('status', 'le financement a ete valide avec succes');
    }


}
