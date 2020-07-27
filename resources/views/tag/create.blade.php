@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">TAG</div>
                <div class="card-body">
                    <form method="POST" action="{{route('tag.store')}}">
                        Tag title: <input type="text" name="tag_title">
                        Tag action: <input type="text" name="tag_action">
                        @csrf
                        <button type="submit">Create a new tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
