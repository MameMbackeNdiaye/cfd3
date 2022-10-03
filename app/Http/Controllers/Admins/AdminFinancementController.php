<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Financement;
use App\Models\User;
use Illuminate\Http\Request;

class AdminFinancementController extends Controller
{
    public function index()
    {
        //return Inertia::render('Admin/Dashboard');
        $financements = Financement::all();
        $users = User::all();
        return view('admin.financement.gestion-financement', ['financements' => $financements, 'users' => $users]);
    }

}
