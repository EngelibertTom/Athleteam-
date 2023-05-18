@extends('app')
@section('content')

<div class="post2">
    <h1>{{$post->title}}</h1>
    <h2>{{$post->Sport}}</h2>
    <img src="../{{$post->image}}">
    <p class="postcontent">{{$post->content}}</p>
    <p>{{$post->author}}</p>
</div>

<h3 class="posth3">Commentaires</h3>
<div class="commentaires2">
@foreach($comment as $comments)
    <div class="comment">
        <p style="margin-bottom: 0">{{ $comments->content }}</p><br>
        <p>{{ $comments->auteur }}</p>
    </div>
@endforeach





</div>
<form  class="formcommentaire" method="POST" action="/comments">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="content" rows="4" cols="50"></textarea><br>
    <button type="submit">Ajouter un commentaire</button>
</form>


@endsection
