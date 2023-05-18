
@extends('app')
@section('content')
<div class="infosprofil">
    <div class="containerprofil">
        <div class="pdp">
            <div class="circle-image" style="background-image: url('{{ str_replace('\\', '/', "../../$profile->url") }}');"></div>
        </div>
        <div class="nom">

            <p>{{$user->name}}</p><br>
            <div class="trait"></div>
            <p>{{$profile->description}}</p>
        </div>

        @if($profile->role == "coach")
            <img src="/images/A.png" style="height:50px; width: auto;">
        @endif
        <div class="abonnements">

            <div id="formulaire-container"></div>
            {{$user->IFollow()->count()}} abonnements
            {{$user->theyFollowMe()->count()}} abonnés



    </div>





    @if($role == "admin")
        @if($profile->role != "coach")
            <form method="POST" action="/setcoach/{{$profile->user_id}}">
                @csrf
                <button type="submit">Attribuer le statut de Coach</button>
            </form>
        @else
            <form method="POST" action="/unsetcoach/{{$profile->user_id}}">
                @csrf
                <button type="submit">Retirer le statut de Coach</button>
            </form>
        @endif
    @endif






    </div>
    <div class="following">
    @if(Auth::id() != $user->id)
        @if(Auth::user()->IFollow->contains($user->id));
        <a href="/follow/{{$user->id}}"> Se désabonner </a> <br />
        @else
            <a href="/follow/{{$user->id}}">S'abonner</a><br />
        @endif
    @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="../js/script.js"></script>
    <h3 class="h3profil">Ses posts </h3>
@foreach ($user->posts as $post)
    <div class="postprofil">
        <div class="imagepost">
            <img src="{{"../../$post->image"}}"> <br>
            <a href="../post/{{$post->id}}"> Voir le post </a>
        </div>
        <div class="infopost">
            <h3>{{ $post->title}}</h3>
            <p class="postcontent">{{ $post->content }}</p>
            <p>{{$post->author}}</p>
            <h3>Commentaires</h3>
            <button class="show-comments-btn2" data-postid="{{$post->id}}">Afficher les commentaires</button>
            <div class="comments-container" data-postid="{{$post->id}}" style="display: none;">
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <p><strong>{{$comment->auteur}}</strong></p>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
                <form class="add-comment-form" data-postid="{{$post->id}}" method="POST" action="/comments">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="content" rows="4" cols="50"></textarea><br>
                    <button type="submit">Ajouter un commentaire</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
{{--
    @if(!is_null($profile->url))

        <img src="../{{$profile->url}}" style="width:50px; height:auto;"><br>

    @endif
    Habite à : {{$profile->city}}<br>
    Numéro :   {{$profile->mobile}}<br>






    --}}
@endsection
