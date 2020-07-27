@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">TAG</div>
                <div class="card-body">
                @foreach ($tags as $tag)                     
                    <a href = "{{route('tag.edit', [$tag])}}">{{$tag->title}}  {{$tag->action}}<br>
                    <form method="POST" action="{{route('tag.destroy', [$tag])}}">
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
