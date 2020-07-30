@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>
                <div class="card-body">
                    <form method="POST" action="{{route('product.update',[$product->id])}}" enctype="multipart/form-data">
                        Pavadinimas: <input type="text" name="product_title" value = "{{$product->title}}"><hr><br>
                        Kaina: <input type="number" name="product_price" value = "{{$product->price}}"><hr><br>
                        Kaina su nuolaida: <input type="number" name="product_sale" value = "{{$product->sale}}"><hr><br>
                        Aprasymas: <input type="text" name="product_description" value = "{{$product->descrip}}"><hr><br>
                        @foreach ($product->getImages as $photo)
                        <img src="{{asset('images/'.$photo->image_name)}}" style="width: 250px; height: auto;">
                        @endforeach
                        <div id="product-photo-inputs-area">
                        <input type="file" name="photo[]" id="">
                        Alt photo name<input type="text" name="alt[]" id="">
                        <div class="form-group">
                            @foreach ($tags as $tag)
                              <label>{{$tag->title}}</label>
                              <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                            @endforeach
                        </div>
                        <div class="form-group">
                            @foreach ($categories as $category)
                            <label>{{$category->title}}</label>
                                @php   
                                $turi=false;
                                @endphp
                                @foreach ($product->getCategory as $productCat)
                                    @if($productCat->categoryRelation->id == $category->id)
                                        @php
                                            $turi = true;
                                        @endphp
                                    @endif 
                                @endforeach
                                    <input type="checkbox" name="categories[]" value="{{$category->id}}"
                                    {{$turi?'checked':''}}>
                            @endforeach

                        </div>
                        </div>
                        @csrf
                        <button id="add-product-photo" type="button" class="btn btn-secondary">add photo</button>
                        <button type="submit" class="btn btn-secondary btn-lg">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection