@extends('layouts.junior')

@section('title')
 Profil
@endsection  

@section('container')

<div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="https://static.vecteezy.com/system/resources/previews/001/188/239/non_2x/heart-logo-png.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1 text-primary">
                Profil Utilisateur
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Gestionnaire de la plateforme
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Informations du profil</p>
                <button class="btn btn-primary btn-sm ms-auto">Détails</button>
              </div>
            </div>
            <div class="card-body">
                <form action="/admin/gestionnaires/gestionnaires-update/{{ $users->id }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                    <p class="text-uppercase text-sm">Informations utilisateurs</p>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nom & Prénom</label>
                            <input class="form-control" name="name" type="text" value="{{$users->name}}">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Adresse email</label>
                            <input class="form-control" name="email" type="email" value="{{$users->email}}">
                        </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">plus..</p>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Genre</label>
                            @if ($users->genre==1)
                            <input class="form-control" readonly type="text" value="Masculin">
                            @else
                            <input class="form-control" readonly type="text" value="Feminin">
                            @endif
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="example-text-input"  class="form-control-label">date d'inscription</label>
                            <input class="form-control" readonly type="text" value="{{$users->created_at}}">
                        </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">A propos de moi</p>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">About me</label>
                            <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
                        </div>
                        </div>
                    </div>
                    <div class="p-1 ml-80 form-group col md-6">
                        <button type="submit" class=" m-2 btn btn-success">Valider</button>
                        <a  href="/admin/gestionnaires/gestionnaires-edit/{{Auth::user()->id}}" class=" m-2 btn btn-danger">Annuler</a>
                    </div>

                </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n5 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png" class="rounded-circle img-fluid border  border-white">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-4 pb-4 pb-lg-3">
              <div class="justify-content-between">
                <h5>
                    {{Auth::user()->name}}
                </h5>
                <div class="h6 font-weight-300">
                    <span class="font-weight-light">{{Auth::user()->email}}</span>
                </div>
                <a href="javascript:;" class="btn btn-sm btn-dark mb-0 d-none d-lg-block"><i class="ni ni-settings m-2 text-white  w-10 text-sm opacity-10"></i>Modifier la photo de profil</a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">22</span>
                      <span class="text-sm opacity-8">projets validés</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-lg font-weight-bolder">10</span>
                      <span class="text-sm opacity-8">projets exclu</span>
                    </div>
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">89</span>
                      <span class="text-sm opacity-8">projets en attentes</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <div class="h6 mt-4">
                @if(Auth::user()->role_id==1)
                    <i class="ni business_briefcase-24 mr-2"></i>- Administrateur General -
                @elseif (Auth::user()->role_id==2)
                    <i class="ni business_briefcase-24 mr-2"></i>- Gestionnaire de projets -
                @else
                    <i class="ni business_briefcase-24 mr-2"></i>- Gestionnaire Financier -
                @endif
                  
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Gestionnaire de plateforme Together
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')

@endsection
