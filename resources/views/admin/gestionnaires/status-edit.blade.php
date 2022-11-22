@extends('layouts.junior')

@section('title')
 Modification de status
@endsection

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 justify-center">
          <div class="card m-4 ">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0" style="color:#492E34;">Edit Profile</p>
              </div>
            </div>
            <div class="card-body">
                <form action="/admin/gestionnaires/status-update/{{ $users->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <p class="text-uppercase text-sm">Changement de status d'utilisateur</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nom et Prenom</label>
                                <input class="form-control" name="username" readonly="readonly" type="text" value="{{ $users->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email address</label>
                                <input class="form-control" name="email" readonly="readonly" type="email" value="{{ $users->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Changer le status</label>
                                <select name="status" class="form-control" id="">
                                @if ($users->status==1)
                                <option value="0">Désactiver</option>
                                    <option value="1" name="text-danger">Activer</option>
                                @else
                                <option value="1" name="text-success">Activer</option>
                                    <option value="0" >Désactiver</option>
                                @endif
                            </select>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center form-group">
                        <p>Confirmez-vous le status choisi pour l'utilisateur {{$users->name}} ?</p>
                        <button type="submit" class="btn btn-success m-2 "  name="submit" id="submit">Oui je confirme</button>
                        <a href="/admin/gestionnaires" class="btn btn-danger m-2"> Annuler</a>
                    </div>

                </form>
            </div>
          </div>
        </div>
    </div>

</div>



@endsection


@section('scripts')

@endsection