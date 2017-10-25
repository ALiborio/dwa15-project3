@extends('layouts.master')


@push('head')
	<script src="https://use.fontawesome.com/623053ff70.js"></script>
	<link href="/css/form.css" type='text/css' rel='stylesheet'>
@endpush

@section('content')
	<div class="container">
		<h1>Generate a Character</h1>
		<form action="/character">
			<div class="form-row">
				<label for="name">Name</label>
				<input type="text" name="name" id="name">
				<div class='radio-group'>
				    <label class='radio-label'>
				        <input type="checkbox" name="generatename" id="generatename">
				        <span class='inner-label sublabel'>Generate a random name</span>
				    </label>
				</div>				
			</div>
			<div class='radio-group'>
			    <label class='radio-label'>
			        <input name='gender' type='radio' id='male' value='male' checked='checked'>
			        <span class='inner-label'>Male</span>
			    </label>
			    <label class='radio-label'>
			        <input name='gender' type='radio' id='female' value='female'>
			        <span class='inner-label'>Female</span>
			    </label>
			</div>
			<div class="form-row">
				<label for="class">Class</label>
				<select id="class" name="class">
					<option value="">-- pick a class --</option>
					<option value="barbarian">Barbarian</option>
					<option value="bard">Bard</option>
					<option value="druid">Druid</option>
					<option value="mage">Mage</option>
					<option value="necromancer">Necromancer</option>
					<option value="rogue">Rogue</option>
					<option value="paladin">Paladin</option>
					<option value="priest">Priest</option>
					<option value="ranger">Ranger</option>
					<option value="warrior">Warrior</option>
				</select>
			</div>
			<div class="form-row">
				<label for="race">Race</label>
				<select id="race" name="race">
					<option value="">-- pick a race --</option>
					<option value="human">Human</option>
					<option value="elf">Elf</option>
					<option value="dwarf">Dwarf</option>
				</select>
			</div>
			<h3 class="alignment">Alignment</h3>
			<div class="alignment-radios">
				<div class="radio-group">
				    <label class="radio-label">
				        <input name="lawchaos" type="radio" id="lawful" value="lawful">
				        <span class="inner-label">Lawful</span>
				    </label>
				    <label class="radio-label">
				        <input name="lawchaos" type="radio" id="neutral" value="neutral">
				        <span class="inner-label">Neutral</span>
				    </label>
				    <label class="radio-label">
				        <input name="lawchaos" type="radio" id="chaotic" value="chaotic">
				        <span class="inner-label">Chaotic</span>
				    </label>
				</div>
				<div class="radio-group">
				    <label class="radio-label">
				        <input name="goodevil" type="radio" id="good" value="good">
				        <span class="inner-label">Good&nbsp;&nbsp;&nbsp;</span>
				    </label>
				    <label class="radio-label">
				        <input name="goodevil" type="radio" id="neutral" value="neutral">
				        <span class="inner-label">Neutral</span>
				    </label>
				    <label class="radio-label">
				        <input name="goodevil" type="radio" id="evil" value="evil">
				        <span class="inner-label">Evil</span>
				    </label>
				</div>
			</div>
			<div class="form-row submit">
				<input type="submit" value="Create Character" class="submit">
			</div>
		</form>
	</div>
@endsection