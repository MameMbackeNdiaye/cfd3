@extends('layouts.master')

@section('title')
 Gestion des financents
@endsection  

@section('container')

<div class="row">
        <div class="col-12 mb-20">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 class="text-secondary font-bold"style="color:#492E34;">Financements a enregistrer</h6>
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
                      <th class="text-uppercase text-black text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-black text-xxs font-weight-bolder opacity-7 ps-2">date</th>
                      <th class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">Demande de factures</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($financements as $f)
                    @if ($f->status=="en attente")
                        
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="m-2">
                            <i style="color:#492E34;" class="ni ni-curved-next text-sm opacity-10"></i>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$f->status}}..</h6>
                            <p class="text-xs text-secondary mb-0">cette demande de fiancement est en attente d'enregistrment</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$f->created_at}}</p>
                        <p class="text-xs text-secondary mb-0">date de lancement</p>
                      </td>
                      <td class="align-middle text-center">
                      @if ($f->facture==1)
                      <span class="text-success text-xs font-weight-bold">Oui</span>
                      @else
                      <span class="text-warning text-xs font-weight-bold">Non</span>
                      @endif
                      </td>
                      <td class="align-middle">
                      <div class="col-6 text-end  justify-center ml-80">
                        <a style="background-color:#492E34;" href="{{url('admin/financements/modif/'.$f->id)}}" class="btn text-white mb-0" ><i class="fas fa-plus"></i>&nbsp;&nbsp;Enregistrer</a>
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

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Carte Entreprise</p>
                          <h6 class="text-white mb-0">Crowdfunding</h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                          <h6 class="text-white mb-0">11/22</h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="https://static.vecteezy.com/system/resources/previews/001/188/239/non_2x/heart-logo-png.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fas fa-landmark opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Budjet</h6>
                      <span class="text-xs">budjet global</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+200 M</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="fab fa-paypal opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Solde</h6>
                      <span class="text-xs">Compte Commission</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+4 M</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="col-6 text-end">
                      <a style="background-color:#492E34;" class="btn  text-white mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Nouveau Moyen de Paiement</a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div class="card card-body border  border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-15 me-3 mb-0" src="https://www.banque.sn/wp-content/uploads/2021/09/wave.png" alt="logo">
                        <h6 class="mb-0">Orange Money Senegal</h6>
                        <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-15 me-3 mb-0" src="https://paydunya.com/refont/images/icon_pydu/partners/om.png" alt="logo">
                        <h6 class="mb-0">Wave Mobile Money</h6>
                        <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Commissions Recentes</h6>
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-outline-primary btn-sm mb-0">Voir tout</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2022</h6>
                    <span class="text-xs">#CodeProjet1</span>
                  </div>
                  <div class="d-flex align-items-center text-primary text-sm">
                    +18000F
                    <button class="btn btn-link text-secondary text-sm mb-0 px-0 ms-4"> details..</button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-primary text-sm">February, 10, 2022</h6>
                    <span class="text-xs">#CodeProjet2</span>
                  </div>
                  <div class="d-flex align-items-center text-primary text-sm">
                    +250000F
                    <button class="btn btn-link text-secondary text-sm mb-0 px-0 ms-4"> details..</button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2022</h6>
                    <span class="text-xs">#CodeProjet1</span>
                  </div>
                  <div class="d-flex align-items-center text-primary text-sm">
                    +560F
                    <button class="btn btn-link text-secondary text-sm mb-0 px-0 ms-4"> details..</button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2019</h6>
                    <span class="text-xs">#CodeProjet4</span>
                  </div>
                  <div class="d-flex align-items-center text-primary text-sm">
                    +120F
                    <button class="btn btn-link text-secondary text-sm mb-0 px-0 ms-4"> details..</button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2019</h6>
                    <span class="text-xs">#CodeProjet5</span>
                  </div>
                  <div class="d-flex align-items-center text-primary text-sm">
                    +300F
                    <button class="btn btn-link text-secondary text-sm mb-0 px-0 ms-4"> details..</button>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>



@endsection


@section('scripts')

@endsection