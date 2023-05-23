@extends('app')

@section('content')

<h1 class="fil">Ajouter un nouveau club</h1>

@if ($errors->has('club_name'))
    <div class="alert alert-danger">
        {{ $errors->first('club_name') }}
    </div>
@endif

<form class="createamatch" action="/admin/clubs" method="POST">
    @csrf
    <div class="form-group" >
        <label for="club_name">Nom du club:</label>
        <input type="text" name="club_name" id="club_name" class="form-control" required>
    </div>
    <button type="submit" class="matchbtn">Ajouter le club</button>
</form>



<h1 class="fil">Ajouter un nouveau match</h1>

@if ($errors->has('match'))
    <div class="alert alert-danger">
        {{ $errors->first('match') }}
    </div>
@endif

<form  class="createamatch"action="/admin/match" method="POST">
    @csrf
    <div class="form-group">
        <label for="sport_id">Sport:</label>
        <select name="sport_id" id="sport_id" class="form-control" required>
            @foreach ($sports as $sport)
                <option value="{{ $sport->id }}">{{ $sport->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="home_club_id">Club à domicile:</label>
        <select name="home_club_id" id="home_club_id" class="form-control" required>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="away_club_id">Club à l'extérieur:</label>
        <select name="away_club_id" id="away_club_id" class="form-control" required>
            @foreach ($clubs as $club)
                <option value="{{ $club->id }}">{{ $club->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="heure">Heure:</label>
        <input type="text" name="heure" id="heure" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="score">Score:</label>
        <input type="text" name="score" id="score" class="form-control" required>
    </div>
    <button type="submit" class="matchbtn">Ajouter le match</button>
</form>


<h1 class="fil">Ajouter un nouveau sport</h1>

@if ($errors->has('sport_name'))
    <div class="alert alert-danger">
        {{ $errors->first('sport_name') }}
    </div>
@endif

<form class="createamatch" action="/admin/sports" method="POST">
    @csrf
    <div class="form-group">
        <label for="sport_name">Nom du sport:</label><br>
        <input type="text" name="sport_name" id="sport_name" class="form-control" required><br>
    </div>
    <button type="submit" class="matchbtn">Ajouter le sport</button>
</form>

    @endsection
