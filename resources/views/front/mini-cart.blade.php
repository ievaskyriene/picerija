
@extends('front.app')

<span class="count">{{$count}}</span>
<span class="total">{{$total}}</span>
<span class="cur">EUR</span>

<div class="mini-cart-list">
<ul>
  

@foreach ($cartProducts as $cartProduct)
<div class = "mini-cart-js"> 
    <div class = "img">
    @foreach ($cartProduct->getImages as $photo)
        <img class = "smallProductImg" src="{{asset('images/'.$photo->image_name)}}" style="width: 50px; height: auto;">
    @endforeach
    </div>
    <div class = "text">
        <h5>{{$cartProduct->title}} </h5>
        <h6>{{$cartProduct->descrip}} </h6>
        X {{$cart[$cartProduct->id]['count']}} {{$cart[$cartProduct->id]['price']}} EUR
  
    <form action="{{route('front.remove')}}" method="POST">
    <input type="hidden" name="product_id" value="{{$cartProduct->id}}">
    @csrf
    <button type="submit">Delete</button>
    </form>
</div>
@endforeach
</ul>
</div>
