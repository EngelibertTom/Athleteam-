@extends('app')
@section('content')



    <h1 class="fil"> Fil d'actualité  </h1>


    <h2 class="file"> Basketball </h2>
{{--
    @if($post !== null)
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

--}}

    <div class="scrollsport" >
        @foreach($post as $key => $posts)

                <div class="post">
                    <h2>{{ $posts->title }}</h2>
                    <img src="{{ $posts->image }}" class="postimg">
                    <p>{{ $posts->content }}</p>
                    <p>{{ $posts->author }}</p>
                    <a href="post/{{$posts->id}}"> Voir le post </a>
                </div>

        @endforeach
    </div>

    <h2 class="file"> Football  </h2>

    <div class="scrollsport" >
        @foreach($foot as $key => $foots)

            <div class="post">
                <h2>{{ $foots->title }}</h2>
                <img src="{{ $foots->image }}" class="postimg">
                <p>{{ $foots->content }}</p>
                <p>{{ $foots->author }}</p>
                <a href="post/{{$foots->id}}"> Voir le post </a>
            </div>

        @endforeach
    </div>


    <h2 class="file"> Tennis  </h2>

    <div class="scrollsport" >
        @foreach($tenis as $key => $tennis)

            <div class="post">
                <h2>{{ $tennis->title }}</h2>
                <img src="{{ $tennis->image }}" class="postimg">
                <p>{{ $tennis->content }}</p>
                <p>{{ $tennis->author }}</p>
                <a href="post/{{$tennis->id}}"> Voir le post </a>
            </div>

        @endforeach
    </div>





    <h2 class="fil"> Découvrez les profils... </h2>
    <div class="lesprofiles">
        @if($profiles->count() > 0)
            @foreach($profiles->random(min(5, $profiles->count())) as $profile)
                <div class="unprofil">
                    <div class="pdp">
                        <div class="circle-image" style="background-image: url('{{ str_replace('\\', '/', $profile->url) }}');"></div>
                    </div>
                    <a href="/profil/{{$profile->user->id}}">{{$profile->user->name}}</a>
                </div>
            @endforeach
        @else
            <p>Aucun profil disponible.</p>
        @endif
    </div>



@endsection
