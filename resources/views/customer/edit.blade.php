@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">TAG</div>
                <div class="card-body">
                    <form method="POST" action="{{route('tag.update',[$customer->id])}}">
                        <label>Customer name:</label>
                        <input type="text" name="customer_name" value="{{$customer->name}}"><br><hr>
                        <label>Customer surname:</label>
                        <input type="text" name="customer_surname" value="{{$customer->surname}}"><br><hr>
                        <label>Customer email:</label>
                        <input type="email" name="customer_email" value="{{$customer->email}}"><br><hr>
                        <label>Customer address:</label>
                        <input type="text" name="customer_adress" value="{{$customer->address}}"><br><hr>
                        <label>Customer phone:</label>
                        <input type="tel" name="customer_phone" value="{{$customer->tel}}"><br><hr>
                       
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection