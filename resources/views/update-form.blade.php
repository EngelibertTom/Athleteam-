
<h1> Editer votre profil </h1>

    <form method="post" action="/profil/update" enctype="multipart/form-data">
@csrf

        <input type="file" name="image" value="{{old('url')}}" required placeholder="L'url"/><br>
{{--        <input type="text" name="city" value="{{old('city')}}" required placeholder="Ville"/><br>--}}
{{--        <input type="text" name="num" value="{{old('num')}}" required placeholder="Téléphone"/><br>--}}
        <input type="text" name="description" value="{{old('description')}}" required placeholder="Description"/><br>

<input type="submit" /><br>
</form>
