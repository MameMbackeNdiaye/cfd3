<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Cagnotte;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AdminProjetController extends Controller
{
    public function index()
    {
        //return Inertia::render('Admin/Dashboard');
        $projets = Projet::paginate(5);
        $projet = Projet::all();
        $users = User::all();
        $cagnottes=Cagnotte::all();
        return view('admin.projets.gestion-projet', ['projet' => $projet,'projets' => $projets, 'users' => $users,'cagnottes'=>$cagnottes]);
    }

    public function edit($id)
    {
        $editprojet= Projet::findOrFail($id);
        $cagnottes = Cagnotte::all();
        
        return view('admin.projets.edit-projet', ['cagnottes'=>$cagnottes])
            ->with('editprojet',$editprojet);
        
    }

    public function update(Request $request, $id)
    {
        $updateprojets = Projet::findOrFail($id);
        $updateprojets->status = $request->input('status');
        $updateprojets->cagnottes_id = $request->input('cagnotte');
        $updateprojets->update();


        return redirect('/admin/projets')->with('status', 'succes');
    }

}
