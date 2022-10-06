<?php

namespace App\Http\Controllers;

use App\Models\Cagnotte;
use App\Models\Projet;
use App\Models\Financement;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ProjetController extends Controller
{
    //
    public function index()
    {
        $projets = Projet::withCount('financement')->get();
        $cagnottes = Cagnotte::all();
        $financements = Financement::all();


        return Inertia::render('Projets/Index', [
            'projets' => $projets,'cagnottes' => $cagnottes,'financements'=>$financements
        ]); 
    }

    public function show( int $id)
    {
        $projet = Projet::where('id', $id)->withCount('financement')->first();

        return Inertia::render('Projets/Show',[
            'projet' => $projet
        ]);
    }

    public function addFinance( int $id)
    {
        $projet = Projet::where('id', $id)->withCount('financement')->first();

        return Inertia::render('Projets/AddFinance',[
            'projet' => $projet
        ]);
    }

    public function addProject()
    {
        $projet = Projet::get();

        return Inertia::render('Projets/AddProject',[
            'projet' => $projet
        ]);
    }
    public function addProjectForm( )
    {
        //$projet = Projet::first();
        $cagnottes = Cagnotte::all();

        return Inertia::render('Projets/AddProjectForm',[
            'cagnotte' => $cagnottes
        ]);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addProjectStore(Request $request){
        //dd($request);
        $cagnotte = new Cagnotte();
        $cagnotte->save(); 
        //1 ou 0
        error_log($cagnotte->id.'-=============================');
        Validator::make($request->all(), [
            'nom' => ['required'],
            'themes_id' => ['required'],
            'description' => ['required'],
            'budjet' => ['required'],
            'users_id' => ['required'],
            
        ])->validate();
       
        Projet::create($request->all());

        return redirect()->back()
                    ->with('message', 'Project Created Successfully.');   

    }

    public function addFinancementStore(Request $request)
    {
        //dd($request);
        Validator::make($request->all(), [
            'projet_id' => ['required'],
            'sommeFinancee' => ['required'],
            'users_id' => ['required'],
            'facture' => ['required'],
            
        ])->validate();
        error_log($request.'-=============================');

        Financement::create($request->all());

        return redirect()->back()
                    ->with('message', 'Financement Created Successfully.');   


    }

}
