<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Financement;
use App\Models\User;

class AdminProfilController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.profil', ['users' => $users]);
    }

}
