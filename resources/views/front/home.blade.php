{{-- @extends('front.app') --}}

@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">PAVADINIMAS</div>
               <div class="card-body">
                <div class="form-group">
                    <label>Pavadinimas</label>
                    {{-- <input type="text" class="form-control"> --}}
                    {{-- <small class="form-text text-muted">Kažkoks parašymas.</small> --}}
                  </div>
                    @foreach ($products as $product)
                    <a href="{{route('product.edit',[$product])}}">{{$product->title}} {{$product->price}}{{$product->sale}}{{$product->descrip}}</a>
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