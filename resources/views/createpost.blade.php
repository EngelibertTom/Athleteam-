@extends('app')

@section('content')

    @auth
        <h2 class="fil"> Création d'un nouveau post</h2>
    <form  class="createapost" method="post" action="/create/post" enctype="multipart/form-data">
        @csrf
        <h2>Créer un nouveau post</h2>

            <label for="titre">Titre :</label><br>
            <input type="text"  name="titre" value="{{old('title')}}"><br><br>
            <label for="sport">Sport :</label><br>
            <select name="sport">
                <option value="Football">Football</option>
                <option value="Basketball">Basketball</option>
                <option value="Tennis">Tennis</option>
            <!-- Ajoutez d'autres sports si nécessaire -->
            </select><br><br>

                <label for="contenu">Contenu :</label><br>
                <textarea  name="contenu"> </textarea><br><br>
                <input type="file" name="image" value="{{old('image')}}" required placeholder="L'url"/><br>
                <input type="submit"/> <br>

    </form>
    @endauth


    @endsection
