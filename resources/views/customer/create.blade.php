@extends('layouts.app')

<style>
    label{
        width: 150px;
    }
</style>
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">CUSTOMER</div>
                <div class="card-body">
                    <form method="POST" action="{{route('customer.store')}}">
                        <label>Customer name:</label>
                        <input type="text" name="customer_name"><br><hr>
                        <label>Customer surname:</label>
                        <input type="text" name="customer_surname"><br><hr>
                        <label>Customer email:</label>
                        <input type="email" name="customer_email"><br><hr>
                        <label>Customer adress:</label>
                        <input type="text" name="customer_adress"><br><hr>
                        <label>Customer phone:</label>
                        <input type="tel" name="customer_phone"><br><hr>
                        @csrf
                        <button type="submit">Create a new customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection