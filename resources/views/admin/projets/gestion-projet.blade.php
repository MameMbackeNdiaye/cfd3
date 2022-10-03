
@extends('layouts.master')

@section('title')
 Gestion des projets
@endsection  

@section('container')



<div class="row">
        <div class="col-12 mb-20">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class="text-primary font-bold">Liste des projets en attente de validation</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-black text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-black text-xxs font-weight-bolder opacity-7 ps-2">Nom</th>
                      <th class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($projets as $p)
                    @if ($p->status=="en attente")
                        
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="m-2">
                            <i class="ni ni-ungroup text-warning text-sm opacity-10"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$p->status}}..</h6>
                            <p class="text-xs text-secondary mb-0">ce projet est en attente de validation</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$p->nom}}</p>
                        <p class="text-xs text-secondary mb-0">projet</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$p->description}}</span>
                      </td>
                      <td class="align-middle">
                      <div class="col-6 text-end  justify-center ml-80">
                        <a href="{{url('admin/projets/modif/'.$p->id)}}" class="btn bg-gradient-warning text-white mb-0" ><i class="fas fa-plus"></i>&nbsp;&nbsp;Valider ce projet</a>
                      </div>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    <hr class="horizontal dark mt-6">
    <h4 class="text-sm text-secondary">Ici vous pouvez observer quelques chiffres du mois en details des projets de la plateforme</h4>
    <div class="row">
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
    <hr class="horizontal dark mt-6">
    <h4 class="text-sm text-secondary text-center">Ici vous pouvez observer quelques chiffres du mois en details des projets de la plateforme</h4>

<div class="row">
    <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Information Porteurs de projets</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Awa Diop</h6>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">AN@gmail.com</span></span>
                    <span class="mb-2 text-xs">Date d'inscription <span class="text-dark font-weight-bold ms-sm-2">21/09/2021</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <p class="btn btn-link text-dark px-3 mb-0" href="javascript:;">1 projet:</p><br>
                    <p class="btn btn-link text-danger px-3 mb-0" href="javascript:;">exclu</p>
                  </div>
                  <div class="ms-auto text-end">
                    <p class="btn btn-link text-dark px-3 mb-0" href="javascript:;">1 projet:</p><br>
                    <p class="btn btn-link text-info px-3 mb-0" href="javascript:;">en cours</p>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Ousmane Sow</h6>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark font-weight-bold ms-sm-2">OS@gmail.con</span></span>
                    <span class="mb-2 text-xs">Date d'inscription<span class="text-dark ms-sm-2 font-weight-bold">09/03/2022</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <p class="btn btn-link text-dark px-3 mb-0" href="javascript:;">1 projet:</p><br>
                    <p class="btn btn-link text-info px-3 mb-0" href="javascript:;">en cours..</p>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Khadija Diop</h6>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                    <span class="mb-2 text-xs">Date d'inscription <span class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <p class="btn btn-link text-dark px-3 mb-0" href="javascript:;">2 projet:</p>
                    <p class="btn btn-link text-success px-3 mb-0" href="javascript:;">acheve</p>
                  </div>
                  <div class="ms-auto text-end">
                    <p class="btn btn-link text-dark px-3 mb-0" href="javascript:;">1 projet:</p>
                    <p class="btn btn-link text-info px-3 mb-0" href="javascript:;">en cours</p>
                  </div>
                </li>
              </ul>
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
@endsection

@section('scripts')
    <script>
    $(document).ready(function(){
        $('#datatable').DataTable();
    });
</script>
@endsection
