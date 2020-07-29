


<span class="count">{{$count}}</span>
<span class="total">{{$total}}</span>
<span class="cur">EUR</span>
<div class="mini-cart-list">
<ul>
  

@foreach ($cartProducts as $cartProduct)

<li>{{$cartProduct->title}} X {{$cart[$cartProduct->id]['count']}} {{$cart[$cartProduct->id]['price']}} EUR --}}
  
    <form action="{{route('front.remove')}}" method="POST">
    <input type="hidden" name="product_id" value="{{$cartProduct->id}}">
    @csrf
    <button type="submit">Delete</button>
    </form>
</li>
@endforeach
</ul>
</div>
