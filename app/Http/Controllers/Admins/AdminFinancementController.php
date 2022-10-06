<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
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

    public function store(Request $request){

    }

}
