
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Produkto koregavimas</div>
               <div class="card-body">
                <div class="form-group">
                    {{-- <input type="text" class="form-control"> --}}
                    {{-- <small class="form-text text-muted">Kažkoks parašymas.</small> --}}
                  </div>
                    @foreach ($products as $product)
                    <a href="{{route('product.edit',[$product])}}">{{$product->title}}</a><br>
                    <a href="{{route('product.edit',[$product])}}">{{$product->price}}</a><br>
                    <a href="{{route('product.edit',[$product])}}">{{$product->sale}}</a><br>
                    <a href="{{route('product.edit',[$product])}}">{{$product->descrip}}</a><br>

                    @foreach ($product->getCategory as $category)
                   
                    <a href="{{route('category.edit',[$category->categoryRelation->id])}}">{{$category->categoryRelation->title}}</a><br>
                    {{-- <p>{{$product->category->title}}</p><br> --}}
                    @endforeach
                
               
                    <form method="POST" action="{{route('product.destroy', [$product])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                        </form>
                     
                        @foreach ($product->getImages as $photo)
                        <img class = 'productImg' src="{{asset('images/'.$photo->image_name)}}" style="width: 250px; height: auto;">
                        @endforeach

                    @endforeach
                </div>
            </div>
        </div>
    </div>
  
</div>
@endsection


