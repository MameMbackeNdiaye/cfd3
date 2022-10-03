@extends('layouts.master')

@section('title')
 Here is our Dashbord
@endsection

@section('container')

<div class="row">
    <div class="row py-4 w-100 ml-80">
        <div class="col-lg-8 mb-lg-0 mb-4 ">
            <div class="card">
                <div class="card-header pb-0 px-3 ">
                    <h6 class="text-primary font-bold">Informations des Gestionnaires</h6>
                </div>
                <div class="col-6 mt-4 mx-auto ">
                    <a class="btn bg-gradient-dark mb-0" href="{{ url('/admin/gestionnaires/create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;nouveau gestionnaire</a>
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
        </div>
                <div class="col-xl-4 mt-12 w-48">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h6 class="text-primary font-bold pt-0">Taches Utilisateurs</h6>
                        </div>
                        <div class="card-body p-40">
                        @foreach ($users as  $user)
                        <ul class="list-group">
                        @if ($user->is_admin==1)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg" v-if="user.is_admin == 1">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                <i class="ni ni-mobile-button text-white opacity-10"></i>
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
    </div>
</div>

 @endsection


@section('scripts')

@endsection