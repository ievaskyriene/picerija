<form method="POST" action="{{route('product.store')}}">
    Pavadinimas: <input type="text" name="product_title">
    Kaina: <input type="number" name="product_price">
    Kaina su nuolaida: <input type="number" name="product_sale">
    Aprasymas: <input type="text" name="product_description">
    @csrf
    <button type="submit">ADD</button>
 </form>
 