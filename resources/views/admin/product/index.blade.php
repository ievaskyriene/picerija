@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($products as $product)
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{$product->title}} {{$product->price}} {{$product->sale}} {{$product->descrip}}</div>
                <div class="card-body">
                    @foreach ($product->getImages as $photo)
                    <img src="{{asset('images/'.$photo->image_name)}}" style="width: 250px; height: auto;">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
