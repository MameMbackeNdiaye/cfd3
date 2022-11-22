@extends('layouts.master')

@section('title')
 Here is our Dashbord
@endsection

@section('container')


    <div class="container-fluid py-4 w-90">
      <div class="row ml-60">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class=" font-bold" style="color:#492E34;">Tableau des Roles</h6>
            </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de Creation</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as  $role)
                        <tr>
                        <td>
                            <div class="px-2 py-1">
                            <div>
                                <i style="color:#492E34;" class="ni ni-button-play  text-md opacity-10"></i>
                            </div>
                                <h6 class="mb-0 text-sm">{{$role->nom}}</h6>
                                <p class="text-xs text-secondary mb-0">gestionnaire</p>
                            </div>
                        </td>
                        <td>
                            <p class=" ml-60 text-xs font-weight-bold mb-0">date</p>
                            <p class="ml-60 text-xs text-secondary mb-0">{{$role->created_at}}</p>
                        </td>
                        <td class="align-middle ml-2">
                            <i style="color:#492E34;" class="ni ni-settings  text-sm opacity-8"></i>
                                <a href="{{ url('/admin/roles/edit/'.$role->id) }}" type="button" name="edit" class=" m-1 text-dark hover-bordered font-weight-bold text-xs" >Editer</a>
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                      </div>
                      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                      </div> 
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="container-fluid py-4 w-80 ml-40">
      <div class="row ml-40 mt-4 bg-slate-200 rounded-xl border-none shadow-lg">
        <div class="">
          <div class="card mb-4 mt-4">
            <div class="card-header pb-0">
              <h6 class=" font-bold" style="color:#492E34;">Roles des Gestionnaires</h6>
              @if (session('status'))
                        <div class="alert alert-success text-light font-bold" role="alert">
                            {{ session('status') }}
                        </div>
            @endif
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom et prenom</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody >
                  @foreach ($user as  $u)
                    <tr>
                    @if ($u->is_admin==1)
                      <td>
                        <div class=" d-flex px-4 py-2 mt-2 ">
                          <div>
                            <i class="ni ni-single-02 text-warning"></i>
                          </div>
                          <div class="d-flex mx-4 flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$u->name}}</h6>
                            <p class="text-xs text-secondary mb-0">{{$u->email}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"></p>
                        @if ($u->is_admin==1)
                        <h6 class="mb-0 text-sm">{{$u->roles->nom}}</h6>
                        <p class="text-xs text-secondary mb-0" >gestionnaire</p>
                        @endif
                      </td>
                      <td>
                      <a  href="/admin/roles/role-edit/{{$u->id}}" class="btn bg-gradient-warning text-white mb-0" ><i class="ni ni-settings-gear-65"></i>&nbsp;&nbsp;Editer le role</a>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    


    <div class="container-fluid py-4 w-90 ml-14">
      <div class="row ml-60">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class=" font-bold" style="color:#492E34;">Utilisateurs de la plateforme</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="datatable" class=" display table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateur</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date d'inscription</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($users as  $user)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                           <i class="ni ni-circle-08 p-4 text-primary"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                            <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                      @if ($user->is_admin==1)
                        <p class="text-xs font-weight-bold mb-0">Administrateur</p>
                        <p class="text-xs text-secondary mb-0" >gestionnaire</p>
                      @else
                        <p class="text-xs font-weight-bold mb-0" >Visiteur</p>
                        <p class="text-xs text-secondary mb-0" >Utilisateur</p>
                      @endif
                        
                        
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$user->created_at}}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                      @if ($user->status==0)
                        <span class="badge badge-sm border-none   text-white bg-gradient-danger">desactivé</span>
                      @else
                        <span class="badge badge-sm border-none  text-white bg-gradient-success">activé</span>
                      @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
          <div class="btn-group">
                <button class="btn">{{$users->render()}}</button>
          </div>

        </div>
      </div>
    </div>

    

@endsection


@section('scripts')


@endsection