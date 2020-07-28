
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

                    <div class="form">
                        <input type="hidden" name="route" value="{{route('front.add-js')}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="text" name="count" value="0"><br><br>
                        <button class="add-button" type="button">ADD TO CART</button>
                    </div> 

                    {{-- <form method="POST" action="{{route('front.add')}}" class="add-form">

                        <div class = "form">
                            <input type="hidden" name="route" value="{{route('front.add')}}">
                            <input type = "hidden" name = "product_id" value = "{{$product->id}}"><br><br>
                            <input type = 'text' name="count" value='0'>
                            <button type="add-button">Add to cart</button>
                        </div>

                    </div>
                        @csrf
                    </form>  --}}
                </div>
            </div>
        </div>
    </div>
    @endforeach 
  
</div>


  
  
@endsection

