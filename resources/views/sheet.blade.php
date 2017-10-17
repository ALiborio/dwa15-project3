@extends('layouts.master')

@section('title')
	Character Sheet
@endsection

@push('head')
	<script src="https://use.fontawesome.com/623053ff70.js"></script>
	<link href="/css/character.css" type='text/css' rel='stylesheet'>
@endpush

@section('content')
<div class="container">
	<div class="portrait">
		<img src="/images/human/male/ranger.png" width="225">
	</div>
	<div class="character">
		<h1 id="charName">
			{{ $character['name'] }} 
		</h1>
		<p>
			{{ $character['race'] }}
		</p>
		<p>
			{{ $character['gender'] }}
		</p>
		<p>
			{{ $character['class'] }}
		</p>
		<p>
			{{ $character['alignment'] }}
		</p>
	</div>
	<div class="stats">
		<h3> Stats </h3>
		<hr>
		<h3>
			Strength: 
			{{ $character['strength'] }}
		</h3>
		<h3>
			Dexterity: 
			{{ $character['dexterity'] }}
		</h3>
		<h3>
			Constitution: 
			{{ $character['constitution'] }}
		</h3>
		<h3>
			Intelligence: 
			{{ $character['intelligence'] }}
		</h3>
		<h3>
			Wisdom: 
			{{ $character['wisdom'] }}
		</h3>
		<h3>
			Charisma: 
			{{ $character['charisma'] }}
		</h3>
	</div>
	<a href="{{ route('index') }}">Start Over</a>
	<a href="{{ url()->full() }}">Reroll Character</a>
</div>
@endsection