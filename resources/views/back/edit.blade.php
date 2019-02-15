@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Modifier un produit</h1>
            <form action="{{url('products/update', $article->id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PUT')}}
                <div class="form">
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input style="width:300px" type="text" name="title" value="{{$article->title}}" class="form-control" id="title">
                        @if($errors->has('title')) <span class="error bg-warning">{{$errors->first('title')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea type="text" name="description" rows="4" class="form-control">{{$article->description}}</textarea>
                        @if($errors->has('description')) <span class="error bg-warning">{{$errors->first('description')}}</span> @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input style="width:100px" type="text" name="price" value="{{$article->price}}" class="form-control" id="price">
                        @if($errors->has('price')) <span class="error bg-warning">{{$errors->first('price')}}</span>@endif
                    </div>

                    <div class="form-select">
                        <label for="category">Catégorie :</label>
                        <select id="category" name="category_id">
                            @foreach($categories as $id => $title)
                            <option value="{{$id}}" <?php if($article->categorie_id == $id) echo 'selected'; ?>>{{$title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-select">
                        <label for="size">Taille :</label>
                        <select id="size" name="size">
                            @forelse($product as $item)
                            <option <?php if($item->size == $article->size) echo 'selected'; ?>>{{$item->size}}</option>
                            @empty
                            <option>aucune taille disponible</option>
                            @endforelse
                            @if($errors->has('size')) 
                            <span class="error bg-warning">{{$errors->first('size')}}</span>
                            @endif
                        </select>
                    </div>

                    <div class="input-file">
                        <h2>Charger un visuel:</h2>
                        <input class="file" type="file" name="picture">
                    </div> 
                </div>                     
                <button style="margin-top: 20px" type="submit" class="btn btn-primary">Enregistrer</button>
        </div> <!-- #end col md 6 -->

        <div class="col-md-6">
            <div class="form-group">
                <div class="input-radio">
                    <h2>Statut</h2>
                    publié <input type="radio" @if($article->status == 'publié') checked @endif name="status" value="publié" > 
                    <br>   
                    brouillon <input type="radio" @if($article->status == 'brouillon') checked @endif name="status" value="brouillon">
                </div>
            </div>

            <div style="margin-top: 10px" class="form-select">
                        <label for="code">Code produit :</label>
                        <select id="code" name="code" class="form-control">
                            <option @if($article->code == 'solde') selected @endif>solde</option>
                            <option @if($article->code == 'nouveautés') selected @endif>nouveautés</option>
                        </select>
            </div>

            <div style="margin-top: 10px" class="form-group">
                        <label for="reference">Référence :</label>
                        <input  style="width:150px" type="text" name="reference" value="{{$article->reference}}" class="form-control" id="reference"
                            placeholder="max: 10 caractères">
                        @if($errors->has('reference')) <span class="error bg-warning">{{$errors->first('reference')}}</span>@endif
            </div>
            
            <div class="card" style="width: 220px;">
  <img class="card-img-top" src="{{asset('images/'.$article->url_image)}}" alt="Card image cap">
  <div class="card-body">
    <p class="card-text text-center">Visuel actuellement utilisé</p>
  </div>
</div>          
        </div> 
    </div>    
     
    </form>
</div> 
@endsection