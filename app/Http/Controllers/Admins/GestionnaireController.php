<?php

namespace App\Http\Controllers\Admins;

use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Laravel\Fortify\Rules\Password as RulesPassword;
use Laravel\Jetstream\Jetstream;


class GestionnaireController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $usersList = User::all();
        return Inertia::render('Admin/Gestionnaires/Index',[
            'users'=> $usersList
        ]);
        /*
        $user= User::cursorPaginate(5);
        return view('admin.Gestionnaires.List', ['users' => $user]);
            */
            $users = User::all();
            $roles = Role::all();
            return view('admin.register', ['users' => $users,'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return Inertia::render('Admin/Gestionnaires/Create');
        
        $users = User::all();
        $roles = Role::all();
        return view('admin.gestionnaires.add', ['users' => $users,'roles' => $roles]);
        
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function store(array $input)
    {
        Validator::make($input, 
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [ 'required', 'string', new Password, 'confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        //error_log($result." =================================================");
  
            return  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role_id' => $input['role_id'],
            'role'=> $input['role'],
            'is_admin' => $input[value('is_admin', 1)],
            'password' => Hash::make($input['password'])
        ]);
  
  
        return redirect('/admin/gestionnaires')->with('status',"L'ajout a ete effectué avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        return Inertia::render('Admin/Gestionnaires/Edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $user->update($request->only('name','email'));
        /*
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
            $user->update($request->only('name','email')); 
        */
        return back();
    }

        /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user,Request $request)
    {
        $user->forceFill([
            'name' => $request['name'],
            'email' => $request['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $roles)
    {
        //
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function addUser(array $data,Request $request)
    {
        Validator::make(
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [ 'required', 'string', new Password, 'confirmed'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],$data)->validate();
        //error_log($result." =================================================");
  
            User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'role'=> $data['role'],
            'is_admin' => $data[value('is_admin', 1)],
            'password' => Hash::make($data['password'])
        ]);
  
  
        return redirect('/admin/gestionnaires')->with('status',"L'ajout a ete effectué avec succès");
    }

    public function editstatus($id)
    {
        $users = User::findOrFail($id);
        return view('admin.gestionnaires.status-edit',['users' => $users]);

    }

    public function updatestatus(Request $request, $id)
    {
        $users = User::find($id);
        $users->status = $request->input('status');
        $users->update();

        return redirect('/admin/gestionnaires')->with('status','La mise a jour a ete effectué avec succès');


    }

    public function gestionnairesedit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.profil',['roles' => $roles])->with('users',$users);

    }

    public function gestionnairesupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->update();

        return back()->with('status','La mise a jour a ete effectué avec succès');


    }
}
