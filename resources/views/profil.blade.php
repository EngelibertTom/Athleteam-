@extends('app')
@section('content')



    @foreach($profil as $aprofil)


        @if($user->id == $aprofil->user_id)

            <div class="infosprofil">
            <div class="containerprofil">

                <div class="pdp">
            <div class="circle-image" style="background-image: url('{{ str_replace('\\', '/', $aprofil->url) }}');"></div>
                </div>
                <div class="nom">

                    <p>{{$user->name}}</p><br>
                    <div class="trait"></div>
                    <p>{{$aprofil->description}}</p>
                </div>
                <div class="abonnements">
                    <button class="modifier-profil">Modifier le profil</button><br>
                    <div id="formulaire-container"></div>
                    {{$user->IFollow()->count()}} abonnements
                    {{$user->theyFollowMe()->count()}} abonnés


                </div>


            </div>
            {{--
            ID : {{$aprofil->user_id}}<br>
            Vous habitez :  {{$aprofil->city}}<br>
            Votre numéro :  {{$aprofil->mobile}}<br>
            --}}
            @if(Auth::id() != $user->id)
                @if(Auth::user()->IFollow->contains($user->id));
                <a href="/follow/{{$user->id}}"> Unfollow</a> <br />
                @else
                    <a href="/follow/{{$user->id}}">Follow</a><br />
                @endif
            @endif
        @endif




    @endforeach







</div>

    <h3 class="h3profil">Mes posts </h3>

        @foreach ($user->posts as $post)
            <div class="postprofil">
                <div class="imagepost">
                    <img src="{{$post->image}}"> <br>
                    <a href="post/{{$post->id}}"> Voir le post </a>
                </div>
                <div class="infopost">
                    <h3>{{ $post->title}}</h3>
                    <p class="postcontent">{{ $post->content }}</p>
                    <p>{{$post->author}}</p>
                    <h3>Commentaires</h3>
                    <button class="show-comments-btn" data-postid="{{$post->id}}">Afficher les commentaires</button>
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
    <div class="blankspace"></div>










    @endsection
