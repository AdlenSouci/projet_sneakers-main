@extends('templates.generic')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>editer un produit</h2>
        </div>
        <div class="pull-right my-2">
            <a class="btn btn-primary " href="{{ route('produits.index') }}"> Retour à la liste </a>
        </div>
    </div>
</div>
<!-- error message-->
@if($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> il y a eu un problème avec votre saisie.<br>
    <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('produits.update' $produit->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>Nom:</strong>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" value="{{ $produit->nom}}">
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group"><strong>description:</strong>
                <textarea class="form-control" style="height:150px" name="description" id="description" placeholder="description">{{ $produit->description }}</textarea>
            </div>
        <div>
            <button type="submit" class="btn btn-info">Enregistrer</button>
        </div>

        </div>
    </div>

</form>


@endsection