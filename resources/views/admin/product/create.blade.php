@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Naujo produko sukūrimas</div>
                <div class="card-body">
                    <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                        Pavadinimas: <input type="text" name="product_title"><hr><br>
                        Kaina: <input type="number" name="product_price"><hr><br>
                        Kaina su nuolaida: <input type="number" name="product_sale"><hr><br>
                        Aprasymas: <input type="text" name="product_description"><hr><br>

                        <div class="form-group">
                          @foreach ($categories as $category)
                            <label>{{$category->title}}</label>
                            <input type="checkbox" name="categories[]" value="{{$category->id}}">
                          @endforeach
                      </div>

                          {{-- <div class="form-group">
                            <select class="form-control" name="tag">
                              <option value="">Select tag</option>
                              <option value="0">Nera</option>
                              @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                              @endforeach
                            </select>
                          </div> --}}

                          <div class="form-group">
                              @foreach ($tags as $tag)
                                <label>{{$tag->title}}</label>
                                <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                              @endforeach
                          </div>
                        
                        <div id="product-photo-inputs-area">
                        <input type="file" name="photo[]" id="">
                        Alt photo name<input type="text" name="alt" id="">
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

 