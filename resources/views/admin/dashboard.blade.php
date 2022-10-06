@extends('layouts.master')

@section('title')
 Here is our Dashbord
@endsection  

@section('container')

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Somme Financée</p>
                    <h5 class="font-weight-bolder">
                      5,300,000 Fcfa
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Nombre d'utilisateur</p>
                    <h5 class="font-weight-bolder">
                      +2,300 
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Nombre de Projets achevés</p>
                    <h5 class="font-weight-bolder">
                      +3,462
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Commissions </p>
                    <h5 class="font-weight-bolder">
                      2,103,430 Fcfa
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 mt-4">
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
                <div class="col-md-5 mt-4">
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Flux des d'investisseurs</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <small>01 - 30 Septembre 2022</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Projet1</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                                    <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Projet2</h6>
                                    <span class="text-xs">01 - 30 Septembre 2022</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + 08 investisseurs
                                </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Projet3</h6>
                                    <span class="text-xs">01 - 30 Septembre 2022</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + 199 investisseurs
                                </div>
                                </li>
                            </ul>
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Projet4</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Projet5</h6>
                                    <span class="text-xs">01 - 30 Septembre 2022</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + 170 investisseurs
                                </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                                    <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Projet6</h6>
                                    <span class="text-xs">01 - 30 Septembre 2022</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + 89 investisseurs
                                </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Projet7</h6>
                                    <span class="text-xs">01 - 30 Septembre 2022</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + 190 investisseurs
                                </div>
                                </li>
                            </ul>
                        </div>
                </div>       
            </div>
      </div>
      <div class="row m-4">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class='text-xl text-primary font-weight-bold' >Informations projets</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="datatable" class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Nom du projet</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Theme</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Budget</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($projets as $p)
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                          <i class="ni ni-bold-right m-4 text-warning text-md opacity-10"></i>
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{$p->nom}}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2">
                            @if ($p->themes_id==1)
                            <div class="d-flex px-2">
                                <div>
                                    <i class="ni ni-tablet-button mx-1 mb-1 text-info text-md opacity-10"></i>
                                </div>
                                <div>
                                    <p class="text-sm mx-1 mb-1 text-blue-800 font-weight-bold ">Technologie</p>
                                </div>
                            </div>
                            @elseif ($p->themes_id==2)
                            <div class="d-flex px-2">
                                <div>
                                    <i class="ni ni-basket mx-1 mb-1 text-success text-md opacity-10"></i>
                                </div>
                                <div>
                                    <p class="text-sm mx-1 mb-1  text-blue-800 font-weight-bold ">Agriculture</p>
                                </div>
                            </div>
                            @else
                            <div class="d-flex px-2">
                        <div>
                            <i class="ni ni-diamond mx-1 mb-1 text-primary text-md opacity-10"></i>
                        </div>
                        <div>
                            <p class="text-sm mx-1 mb-1  text-blue-800 font-weight-bold ">Energie/Ressources naturelles</p>
                        </div>
                      </div>
                            @endif
                        </div>
                      </td>
                      <td>
                      <div class="d-flex px-2">
                        <div>
                            <i class="ni ni-money-coins m-1 text-success text-md opacity-10"></i>
                        </div>
                        <div>
                            <p class="text-sm m-1  text-blue-800 font-weight-bold mb-0">{{$p->budjet}} Fr</p>
                        </div>
                      </div>
                      </td>
                      <td>
                        <span class="text-sm font-weight-bold">{{$p->status}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">0%</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 1%;"></div>
                            </div>
                          </div>
                        </div>
                      </td>
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

    </div>

@endsection

@section('scripts')

@endsection

