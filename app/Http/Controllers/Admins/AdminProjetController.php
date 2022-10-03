<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;


class AdminProjetController extends Controller
{
    public function index()
    {
        //return Inertia::render('Admin/Dashboard');
        $projets = Projet::all();
        $users = User::all();
        return view('admin.projets.gestion-projet', ['projets' => $projets, 'users' => $users]);
    }

    public function edit($id)
    {
        $editprojet= Projet::findOrFail($id);
        
        return view('admin.projets.edit-projet')
            ->with('editprojet',$editprojet);
        
    }

    public function update(Request $request, $id)
    {
        $updateprojets = Projet::findOrFail($id);
        $updateprojets->status = $request->input('status');
        $updateprojets->update();

        return redirect('/admin/projets')->with('status', 'le projet a ete valide avec succes');
    }

}
