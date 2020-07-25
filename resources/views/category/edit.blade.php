<form method="POST" action="{{route('category.update',[$category->id])}}">
    Name: <input type="text" name="name" value="{{$category->title}}">
    @csrf
    <button type="submit">EDIT</button>
 </form>