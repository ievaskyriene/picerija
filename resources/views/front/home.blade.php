
@extends('front.app')

@section('content')

<div class="container">
    @foreach ($products as $product)
    <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{$product->title}} </div>
               <div class="card-header">{{$product->price}} </div>
               <div class="card-header">{{$product->descrip}} </div>
               <div class="card-body">
                    @foreach ($product->getImages as $photo)
                    <img class = 'productImg' src="{{asset('images/'.$photo->image_name)}}" style="width: 250px; height: auto;">
                    @endforeach
                    <form method="POST" action="{{route('front.add')}}" class="add-form">
                        <input type = "hidden" name = "product_id" value = "{{$product->id}}"><br><br>
                        <input type = 'text' name="count" value='0'>
                        <button type="submit">Add to cart</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach 
  
</div>


  
  
@endsection