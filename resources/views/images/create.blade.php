<form method="POST" action="{{route('image.store')}}" enctype="multipart/form-data">
    Alt: <input type="text" name="mechanic_name">
    Surname: <input type="text" name="mechanic_surname">
    Portret: <input type="file" name="portret">
    @csrf
    <button type="submit">ADD</button>
 </form>