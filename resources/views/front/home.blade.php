
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
      {{-- @foreach ($categories as $category)
        {{-- <a href=${dataHMenu[i].ref} class = {{$category->title}}}>
          ${dataHMenu[i].text}</a> --}}
      {{-- @endforeach --}}
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


    @foreach ($categories as $category)
    <div class="{{$category->title}}" id="{{$category->title}}"> 
        <div class = "grid_container">
            <h1>{{$category->title}}</h1>
        </div>
      <div class = "grid_container pica_row">
          @foreach(App\ProductCategory::where('category_id', $category->id)->get() as $productCat)
            <div class="produktas">
                @foreach ($productCat->productRelation->getImages as $photo)
                  <img class = 'productImg' src="{{asset('images/'.$photo->image_name)}}" style="width: 250px; height: auto;">
                @endforeach
                <h3>{{$productCat->productRelation->title}} </h3>
                <h4>{{$productCat->productRelation->descrip}} </h4>
                <div class = "price_row">
                  <h4>{{$productCat->productRelation->price}}</h4>
                    <div class="form">
                        <input type="hidden" name="route" value="{{route('front.add-js')}}">
                        <input type="hidden" name="product_id" value="{{$productCat->productRelation->id}}">
                        <input type="text" name="count" value="0"><br><br>
                        <button class="add-button" type="button">ADD TO CART</button>
                    </div> 
                </div>
            </div> 
          @endforeach 
      </div> 
    </div>
    @endforeach      

    
    <form action="{{route('buy')}}" method="POST">
      Name: <input type="text" name="name" value =""><br><br>
      Surname: <input type="text" name="surname" value =""><br><br>
      Email: <input type="email" name="email" value =""><br><br>
      Phone: <input type="text" name="phone" value =""><br><br>
      <button class="add-button" type="submit">BUY PIZZA</button>
      @csrf
    </form>



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


