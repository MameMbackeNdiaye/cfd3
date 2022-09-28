<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        return Inertia::render('Admin/Roles/Index',[
            'roles' => Role::all(),
            'users'=> User::all()
        ]);
        */
        $roles = Role::all();
        $users = User::all();
        return view('admin.role', ['roles' => $roles, 'users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Roles/Create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nom' => ['required'],
        ])->validate();
  
        Role::create($request->all());
  
        return redirect()->back()
                    ->with('message', 'Role Created Successfully.');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Role $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
        return Inertia::render('Admin/Roles/Edit', [
            'role' => Role::findOrFail($id)
        ]); 
        */
        $roles = Role::findOrFail($id);
        
        return view('admin.role.edit')
            ->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $roles = Role::findOrFail($id);
        $roles->nom = $request->input('nom');
        $roles->update();

        return redirect('/admin/roles')->with('status','La mise a jour a ete effectué avec succès');
        
        
        
        /*
        $validated = $request->validate([ 'nom' => 'required' ]);
        /*
        Validator::make($request->all(), [
            'nom'=>'required',
        ]);
        */
        /*
        if(isset($_GET['id'])){
            error_log($_GET['id']);
        }
        
        $rol = Role::where('id',explode('/',$request->path())[3]);
        //error_log("role =" .$rol->nom);
        //$rol->nom = $request->input('nom');

        $r = $rol->update($validated);
        $result = $r?"ok":"ko";
        error_log($result." =================================================".explode('/',$request->path())[3]);
*/
        /*
        Validator::make($input, [
            'nom' => ['required'],
        ])->validateWithBag('submit');

        $r= $role->forceFill([
                'nom' => $input['nom'],
            ])->save();
            $result = $r?"ok":"ko";
            error_log($result." =================================================");
    */
        /*
        Validator::make($request->all(), [
            'nom'=>'required',
        ]);
        $r = $role->update($request->input('nom'));
        $result = $r?"ok":"ko";
        error_log($result." =================================================");
        */
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        Role::destroy($request->id);

        return redirect()->back()
            ->with('message', 'Role deleted successfully.');
    }
    public function registeredit(Request $request , $id){

        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.register-edit',['roles' => $roles])->with('users',$users);
    }

    public function registerupdate(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->input('username');
        $users->email = $request->input('email');
        $users->role_id = $request->input('userType');
        $users->update();

        return redirect('/admin/roles')->with('status','La mise a jour a ete effectué avec succès');
    }

}

