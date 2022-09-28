@extends('layouts.junior')

@section('title')
 Modification de roles
@endsection

@section('container')

<div class="row py-4 m-40">
        <div class="col-lg-8 mb-lg-0 mb-4">
          <div class="card m-40">
            <form action="{{ url('/admin/roles/update/'. $roles->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

                <div class="card-header rounded-sm margin-20 pb-0 px-3">
                <h4 class="text-primary mb-4">Modification de role</h4>
                </div>
                <div class="form-group col md-6">
                    <label for="example-text-input " class="form-control-label text-lg m-4">Nom:</label>
                    <input type="text" class="form-control border-inherit rounded-lg shadow-sm w-50 m-auto" value="{{ $roles->nom }}" name="nom" id="nom"/>
                </div>
                    <div class="p-1 ml-80 form-group col md-6">
                        <button type="submit" class=" m-2 btn btn-success">Valider</button>
                        <a  href="{{ url('/admin/roles')}}" class=" m-2 btn btn-danger">Annuler</a>
                    </div>
            </form>
        </div>
    </div>
 </div>



@endsection


@section('scripts')

@endsection