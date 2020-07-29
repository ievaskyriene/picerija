
@extends('front.app')

@section('content')

<div class="grid_container header" > 
    <div class="logo_column">
        <a href="#"><img class="logo" src="./img/logo.svg" alt="Logo" /></a>
        <h1>DODO PIZZA</h1>
    </div>
   
    <div class="pristatymas">
        <h3>
        Nemokamas picų pristatymas <a class="Vilnius" href="#">Vilnius</a>
        </h3>
        <h4>
        60 minučių arba sekanti pica nemokamai
        </h4>
    </div>

    <div>
      <h4>
        Skambinkite
      </h4>
        <h3>
        8 635 11 555
      </h3>
    </div>

    <div class = "button">
      <button class="prisijungti">Prisijungti</button>
    </div>
</div>
</div>

<div class = "grid_container header_menu" id="main_header">
    <nav>
    </nav>

    
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                       
                        <li class="nav-item">
                            <a class="nav-link shop-cart" href="">
                            {{-- @include('front.cart-svg') --}}
                                <div id="cart-count">
                                @include('front.mini-cart')
                                </div>
                            </a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class=" picos" id="picos"> 
    <div class = "grid_container">
      <h2>Picos</h2>
    </div>

    <div class = "grid_container pica_row">
        @foreach ($products as $product)
        
        {{-- <div class="row justify-content-center"> --}}
           {{-- <div class="col-md-8"> --}}
               <div class="produktas">
                @foreach ($product->getImages as $photo)
                <img class = 'productImg' src="{{asset('images/'.$photo->image_name)}}" style="width: 250px; height: auto;">
                @endforeach
                    <h3>{{$product->title}} </h3>
                    <h4>{{$product->descrip}} </h4>
                    <div class = "price_row">
                    <h4>{{$product->price}}</h4>
        
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
            {{-- </div>
        </div> --}}
        @endforeach 
      <!-- <div class="produktas">
        <img src='./img/pirma_pica.jpg'>
        <h3>Carbonara</h3>
        <h3>Tekstas</h3>
        <div class = "price_row">
          <h3>Nuo 8,75</h3>
          <button class="pasirinkti">Krepselis</button>
        </div> -->
    </div>          
  </div>

<div class="uzkandziai" id="uzkandziai"> 
  <div class = "grid_container">
    <h2>Užkandžiai</h2>
  </div>
  <div class="grid_container uzkandziai_row">
  </div>
</div>

<div class="desertai" id="desertai"> 
  <div class = "grid_container">
    <h2>Desertai</h2>
  </div>
  <div class="grid_container desertai_row">
  </div>
</div>


<div class="gerimai" id="gerimai"> 
  <div class = "grid_container">
    <h2>Gėrimai</h2>
  </div>
  <div class="grid_container gerimai_row">
  </div>
</div>

<div class="container">
 
  
</div>


  
  
@endsection

