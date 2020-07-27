<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<form method="POST" action="{{route('category.update',[$category->id])}}">
    Name: <input type="text" name="name" value="{{$category->title}}">

    {{-- <div class="form-group">
        <select class="form-control" name="parent_id">
          <option value="">Select Parent Category</option>

          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
          @endforeach
        </select>
      </div> --}}
    @csrf
    <button type="submit">EDIT</button>
 </form>