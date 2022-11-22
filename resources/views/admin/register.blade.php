@extends('layouts.master')

@section('title')
 Here is our Dashbord
@endsection

@section('container')

@if(Auth::user()->role_id != 1)
    <div class="row m   l-60">
        <div class="col-lg-6 mb-lg-0 mb-4 w-50">
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
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as  $role)
                        <tr>
                        <td>
                            <div class="px-2 py-1">
                            <div>
                                <i style="color:#492E34;" class="ni ni-button-play text-md opacity-10"></i>
                            </div>
                                <h6 class="mb-0 text-sm">{{$role->nom}}</h6>
                                <p class="text-xs text-secondary mb-0">gestionnaire</p>
                            </div>
                        </td>
                        <td>
                            <p class=" ml-60 text-xs font-weight-bold mb-0">date</p>
                            <p class="ml-60 text-xs text-secondary mb-0">{{$role->created_at}}</p>
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
        <div class="container-fluid col-lg-6 mb-lg-0 mb-4">
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
                            </tr>
                        </thead>
                        <tbody >
                        @foreach ($users as  $user)
                            <tr>
                            @if ($user->is_admin==1)
                            <td>
                                <div class=" d-flex px-4 py-2 mt-2 ">
                                <div>
                                    <i style="color:#492E34;" class="ni ni-single-02 "></i>
                                </div>
                                <div class="d-flex mx-4 flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                    <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"></p>
                                @if ($user->is_admin==1)
                                <h6 class="mb-0 text-sm">{{$user->roles->nom}}</h6>
                                <p class="text-xs text-secondary mb-0" >gestionnaire</p>
                                @endif
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
    @endif
<div class="row">
    <div class="row py-4 w-100 ml-80">
        <div class="col-lg-8 mb-lg-0 mb-4 ">
            @if(Auth::user()->role_id == 1)
            <div class="card">
                <div class="card-header pb-0 px-3 ">
                    <h6 class=" font-bold" style="color:#492E34;">Informations des Gestionnaires</h6>
                </div>
                <div class="col-6 mt-4 mx-auto ml-8 ">
                    <a style="background-color:#492E34;" class="btn text-white mb-0" href="{{ url('/admin/gestionnaires/create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;nouveau gestionnaire</a>
                </div>
                <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" >
                    <div class="card-body pt-0 p-3" >
                        @foreach ($users as  $user)
                        <ul class="list-group">
                        @if ($user->is_admin==1)
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm font-bold">{{$user->name}}</h6>
                                    <span class="mb-2 text-xs">Email: <span class="text-dark font-weight-bold ms-sm-2">{{$user->email}}</span></span>
                                    <span class="mb-2 text-xs">Fonction: <span class="text-dark ms-sm-2 font-weight-bold">{{$user->roles->nom}}</span></span>
                                    <span class="text-xs"> Date d'inscription: <span class="text-dark ms-sm-2 font-weight-bold">{{$user->created_at}}</span></span>
                                </div>
                                <div class="ms-auto text-end mt-4">
                                @if ($user->status==1)
                                    <span class="badge badge-sm border-none  text-white bg-gradient-success">activé</span>
                                    <a href="/admin/gestionnaires/status-edit/{{ $user->id }}" type="button" class="btn btn-link text-warning px-3 mb-0" ><i class="fas fa-pencil-alt text-warning me-2" aria-hidden="true"></i>Désactiver </a>
                                @else
                                    <span class="badge badge-sm border-none  text-white bg-gradient-danger">désactivé</span>
                                    <a href="/admin/gestionnaires/status-edit/{{ $user->id }}" type="button" class="btn btn-link text-success px-3 mb-0" ><i class="fas fa-pencil-alt text-success me-2" aria-hidden="true"></i>Activer</a>
                                @endif
                                </div>
                                </li>
                            @endif
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
    @if(Auth::user()->role_id == 1)
        <div class="col-xl-4 mt-12 w-48">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h6 class=" font-bold pt-0" style="color:#492E34;">Taches Utilisateurs</h6>
                        </div>
                        <div class="card-body p-40">
                        @foreach ($users as  $user)
                        <ul class="list-group">
                        @if ($user->is_admin==1)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" v-if="user.is_admin == 1">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                <i  class="ni ni-mobile-button text-white  opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column" >
                                <h6 class="mb-1 text-slate-600 text-sm font-bold" >{{$user->name}}</h6>
                                <span class="text-xs">flux ajouté, <span class="font-weight-bold">+30</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded  btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right text-dark" aria-hidden="true"></i></button>
                            </div>
                            </li>
                            @endif
                        </ul>
                        @endforeach
                        </div>
                    </div>
                </div>
            @endif
    </div>
</div>

 @endsection


@section('scripts')



@endsection