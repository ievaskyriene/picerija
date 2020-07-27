@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">TAG</div>
                <div class="card-body">
                    <form method="POST" action="{{route('tag.update',[$tag->id])}}">
                        Title: <input type="text" name="tag_title" value="{{$tag->title}}">
                        Action: <input type="text" name="tag_action" value="{{$tag->action}}">
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
