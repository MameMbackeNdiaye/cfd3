@extends('layouts.junior')

@section('title')
 Here is our Dashbord
@endsection

@section('container')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 justify-center">
          <div class="card m-4 ">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0" style="color:#492E34;">Edit Profile</p>
                <button class="btn btn-dark btn-sm ms-auto">Settings</button>
              </div>
            </div>
            <div class="card-body">
                <form action="/admin/roles/role-register-update/{{ $users->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <p class="text-uppercase text-sm">User Information</p>
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
                                <label for="example-text-input" class="form-control-label">Choisissez un role</label>
                                <select name="userType" class="form-control" id="">
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
                        <a href="/admin/roles" class="btn btn-danger m-2"> Annuler</a>
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