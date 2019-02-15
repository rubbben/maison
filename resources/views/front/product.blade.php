@extends('layouts.master')

@section('content')

<br>
<div class="container">
  <div class="row">
    <div class="col-sm">
        <p><img width="150" src="{{asset('images/'.$products->url_image)}}" alt="{{$products->title}}" class="thumbnail rounded"></p>
        <p><img width="150" src="{{asset('images/'.$products->url_image)}}" alt="{{$products->title}}" class="thumbnail rounded"></p>
        <p><img width="150" src="{{asset('images/'.$products->url_image)}}" alt="{{$products->title}}" class="thumbnail rounded"></p>
    </div>
    <div class="col-lg-6">
        <img width="500" src="{{asset('images/'.$products->url_image)}}" alt="{{$products->title}}" class="img-thumbnail">
    </div>
    <div class="col-sm">
      <span>{{$products->title}}</span>
      <br>
      <span>ref : {{$products->reference}}</span>
      <br>
      <span>{{$products->price}} euros</span>
    </div>
  </div>

  <div class="row">
    <div class="col-lg">
        <span><strong>Description : </strong></span>
        <p>{{$products->description}}</p>
    </div>
  </div>

</div>


@endsection