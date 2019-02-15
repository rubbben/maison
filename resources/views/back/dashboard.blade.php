@extends('layouts.master')

@section('content')
<br>
<h1>{{$title}}</h1>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Prix</th>
      <th scope="col">Statut</th>
      <th scope="col">Ajouter un produit</th>
      <th scope="col">Mettre à jour</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  @forelse($products as $product)
  <tbody>
    <tr>
      <th scope="row">{{$product->title}}</th>
      <td>{{$product->category_id}}</td>
      <td>{{$product->price}} €</td>
      <td>{{$product->status}}</td>
      <td><a href="{{asset(url('products/create'))}}"><button type="button" class="btn btn-primary">Ajout</button></a></td>
      <td><a href="{{url('products/edit', $product->id)}}"><button type="button" class="btn btn-secondary bouton">Mettre à jour</button></a></td>
      <td><a href="{{url('products/destroy', $product->id)}}"><button type="button" class="btn btn-danger bouton">Supprimer</button></a></td>
    </tr>
  </tbody>
  @empty<p>Pas d'article disponible</p>
@endforelse
</table>

@endsection