@extends('layouts.junior')

@section('title')
ajout
@endsection

@section('container')


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 justify-center">
          <div class="card m-4 ">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0" style="color:#492E34;">Formulaire d'ajout</p>
              </div>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/gestionnaires/addUser') }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                    <p class="text-uppercase text-secondary text-sm">User Information</p>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nom et Prenom</label>
                                <input class="form-control" name="username" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email address</label>
                                <input class="form-control" name="email" type="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Mot de passe</label>
                                <input class="form-control" name="password" type="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Confirmez le Mot de passe</label>
                                <input class="form-control" name="password_confirmation" type="password" >
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Choisissez un role</label>
                                <select name="role" class="form-control" id="">
                                <option value="0">Faites un choix</option>
                                        @foreach($roles as $r)
                                            <option value="{{ $r->id }}"> {{ $r->nom }}</option>
                                        @endforeach
                            </select>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center form-group">
                        <button type="submit" class="btn btn-success m-2 "  name="submit" id="submit">Valider</button>
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