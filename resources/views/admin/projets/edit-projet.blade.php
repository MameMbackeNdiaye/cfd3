@extends('layouts.junior')

@section('title')
 Validation de projets
@endsection  

@section('container')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary">Validation de projet</h4>
            
                <form action="{{ url('/admin/projets/update/'. $editprojet->id) }}" method="post">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}

                    <p class="text-uppercase text-sm">Informations du projets</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nom</label>
                                <input value="{{$editprojet->nom}}" readonly class="form-control" name="nom" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">theme</label>
                                <input class="form-control" readonly value="{{$editprojet->theme->nom}}" name="theme" type="text">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Lancer la cagnotte</label>
                                @foreach ($cagnottes as  $c)
                                    @if ($c->created_at==$editprojet->created_at)
                                        <input class="form-control" readonly value="{{$c->id}}" name="cagnottes_id" type="text">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Description</label>
                                <textarea class="form-control" rows="4" cols="5"  name="description" >{{$editprojet->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Confirmez la validation de ce projet</label>
                                <select name="status" class="form-control" id="">
                                    <option value="valide" selected>oui je valide le projet</option>
                                    <option value="exclu">non le projet n'est pas valide</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Motif de refus(* en cas de projet non valide )</label>
                                <input class="form-control" name="motifrefus" type="text">
                            </div>
                        </div>

                    </div>
                    <div class="d-flex align-items-center form-group">
                        <a href="/admin/projets" class="btn btn-danger m-2"> Annuler</a>
                        <button type="submit" class="btn btn-success m-2 "  name="submit" id="submit">Soumettre</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection
