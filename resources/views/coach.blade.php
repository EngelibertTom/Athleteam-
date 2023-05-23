@extends('app')
@section('content')
    <div style="position:relative">
    <h1 class="fil">Les coachs</h1>
    <img src="images/A.png" style="position:absolute; height:50px; top:-7px; left:200px;">
    </div>

    <div class="lesprofiles">
        <div class="flex-container">
@foreach($profiles as $profile)
    <div class="unprofil">
    <img src="{{$profile->url}}"><br>
        <a href="/profil/{{$profile->user->id}}"> {{$profile->user->name}} </a>
    </div>
    @endforeach
        </div>
    </div>
    @endsection
