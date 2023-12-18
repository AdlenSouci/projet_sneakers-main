@extends('templates.generic')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Affichage d'un produit</h2>
        </div>
        <div class="pull-right my-2">
            <a class="btn btn-primary " href="{{ route('produits.index') }}"> Retour à la liste </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group"><strong>Nom:</strong>
            {{ $produit->nom}}
        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group"><strong>Nom:</strong>
            {{ $produit->description}}
        </div>

    </div>
</div>


@endsection