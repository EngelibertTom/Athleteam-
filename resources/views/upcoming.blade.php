@extends('app')

@section('content')
<h1 class="fil">Matchs à venir</h1>

@if($matches->isEmpty())
    <p>Aucun match à venir.</p>
@else
    <ul>
        @foreach($matches as $match)
            <li class="match">
                <div class="title">{{ $match->homeClub->name }} vs {{ $match->awayClub->name }}</div>
                <div class="details">
                    Sport : {{ $match->sport->name }} <br>
                    Date : {{ $match->date }}<br>
                    Heure : {{ $match->heure }}
                </div>
                <div class="score">{{ $match->score }}</div>
            </li>
        @endforeach
    </ul>
@endif

    @endsection
