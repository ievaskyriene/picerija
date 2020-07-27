@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">TAG</div>
                <div class="card-body">
                @foreach ($customers as $customer)                     
                    <a href = "{{route('customer.edit', [$customer])}}">{{$customer->name}}  {{$customer->surname}} {{$customer->email}} {{$customer->address}} {{$customer->tel}}<br>
                    <form method="POST" action="{{route('customer.destroy', [$customer])}}">
                        @csrf
                        <button type="submit">DELETE</button>
                    </form>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection