@extends('templates.generic')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Liste des produits</h2>
        </div>
        <div class="pull-right my-2">
            <a class="btn btn-primary " href="{{ route('produits.create') }}"> Ajouter des produits </a>
        </div>
    </div>
</div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p> {{$message}}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Details</th>
            <th width="320px"></th>
        </tr>

        @foreach ($produits as $produit )
        <tr>
            <td>{{$produit->id}}</td>
            <td>{{$produit->nom}}</td>
            <td>{{$produit->description}}</td>
            <td>
                <a class="btn btn-info" href={{ route('produits.show',$produit->id)}}">detail</a>
                <a class="btn btn-primary" href={{ route('produits.edit',$produit->id)}}">Modifier</a>
                <form action="{{ route('produits.destroy', $produit->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>

            </td>
        </tr>
        @endforeach

    </table>


</div>
@endsection