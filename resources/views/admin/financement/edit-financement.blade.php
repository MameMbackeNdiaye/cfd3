@extends('layouts.junior')

@section('title')
 Validation d'investissement
@endsection  

@section('container')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" style="color:#492E34;">Enregistrement d'un investissement</h4>
            
                <form action="{{ url('/admin/financements/update/'. $editfinancement->id) }}" method="post">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <p class="text-uppercase text-sm">Informations</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Projet Finance</label>
                                <input value="{{$editfinancement->projet->nom}}" readonly class="form-control" name="projet" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Somme cagnotte apres financement</label>
                                <input value="{{$editfinancement->projet->cagnotte->somme + $editfinancement->sommeFinancee}}" readonly class="form-control" name="somme" type="number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">date de financement</label>
                                <input class="form-control" readonly value="{{$editfinancement->created_at}}" name="created_at" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Somme financee</label>
                                <input class="form-control" readonly value="{{$editfinancement->sommeFinancee}}" name="sommeFinancee" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Action</label>
                                <input class="form-control" readonly value="enregistre" name="status" type="text">
                            </div>
                        </div>

                    </div>
                    <div class="d-flex align-items-center form-group">
                    @if ($editfinancement->facture==1)
                        <button type="submit" class="btn btn-success m-2 "  name="submit" id="submit">Enregistrer puis imprimer la facture</button>
                    @else
                    <button type="submit" class="btn btn-success m-2 "  name="submit" id="submit">Enregistrer le financement</button>
                    @endif
                        <a href="/admin/financements" class="btn btn-danger m-2"> Annuler</a>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
