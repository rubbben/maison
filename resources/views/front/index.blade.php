@extends('layouts.master')

@section('content')

<br>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    
    {{$products->links()}}

  </ul>
</nav>



<div class="row">
    @foreach($products as $product)
        <div class="col-lg-4" width="100px">    
                <a href="{{url('product',$product->id)}}"  >
                    <img src="{{asset('images/'.$product->url_image)}}" alt="{{$product->title}}" class="thumbnail rounded">
                </a>
            <h3><a href="{{url('product',$product->id)}}">{{ucfirst($product->title)}}</a></h3>
            <p>{{$product->price}} €</p>    
        </div>
    @endforeach
</div>

@endsection