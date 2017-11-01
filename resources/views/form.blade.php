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
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @if($errors->get('name'))
                <ul>
                    @foreach($errors->get('name') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
                
            <div class='radio-group'>
                <label class='radio-label'>
                    <input type="checkbox" name="generatename" id="generatename" @if (old('generatename')) CHECKED @endif>
                    <span class='inner-label sublabel'>Generate a random name</span>
                </label>
            </div>
            @if($errors->get('generatename'))
            <ul>
                @foreach($errors->get('generatename') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class='radio-group'>
            <label class='radio-label'>
                <input name='gender' type='radio' id='male' value='male' @if (old('gender') == 'male') CHECKED @endif>
                <span class='inner-label'>Male</span>
           </label>
           <label class='radio-label'>
                <input name='gender' type='radio' id='female' value='female' @if (old('gender') == 'female') CHECKED @endif>
                <span class='inner-label'>Female</span>
           </label>
        </div>
        <div class="form-row">
            <label for="class">Class</label>
            <select id="class" name="class">
                <option value="">-- pick a class --</option>
                <option value="barbarian" @if (old('class') == 'barbarian') selected @endif>
                    Barbarian
                </option>
                <option value="bard" @if (old('class') == 'bard') selected @endif>
                    Bard
                </option>
                <option value="druid" @if (old('class') == 'druid') selected @endif>
                    Druid
                </option>
                <option value="mage" @if (old('class') == 'mage') selected @endif>
                    Mage
                </option>
                <option value="necromancer" @if (old('class') == 'necromancer') selected @endif>
                    Necromancer
                </option>
                <option value="rogue" @if (old('class') == 'rogue') selected @endif>
                    Rogue
                </option>
                <option value="paladin"@if (old('class') == 'paladin') selected @endif>
                    Paladin
                </option>
                <option value="priest" @if (old('class') == 'priest') selected @endif>
                    Priest
                </option>
                <option value="ranger" @if (old('class') == 'ranger') selected @endif>
                    Ranger
                </option>
                <option value="warrior" @if (old('class') == 'warrior') selected @endif>
                    Warrior
                </option>
            </select>
        </div>
        @if($errors->get('class'))
            <ul>
               @foreach($errors->get('class') as $error)
                   <li>{{ $error }}</li>
               @endforeach
            </ul>
        @endif
        <div class="form-row">
            <label for="race">Race</label>
            <select id="race" name="race">
                <option value="">-- pick a race --</option>
                <option value="human" @if (old('race') == 'human') selected @endif>
                    Human
                </option>
                <option value="elf" @if (old('race') == 'elf') selected @endif>
                    Elf
                </option>
                <option value="dwarf" @if (old('race') == 'dwarf') selected @endif>
                    Dwarf
                </option>
            </select>
        </div>
        @if($errors->get('race'))
            <ul>
                @foreach($errors->get('race') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <h3 class="alignment">Alignment</h3>
        <div class="alignment-radios">
            <div class="radio-group">
                <label class="radio-label">
                    <input name="lawchaos" type="radio" id="lawful" value="lawful" @if (old('lawchaos') == 'lawful') CHECKED @endif>
                    <span class="inner-label">Lawful</span>
                </label>
                <label class="radio-label">
                    <input name="lawchaos" type="radio" id="lcneutral" value="neutral" @if (old('lawchaos') == 'neutral') CHECKED @endif>
                    <span class="inner-label">Neutral</span>
                </label>
                <label class="radio-label">
                    <input name="lawchaos" type="radio" id="chaotic" value="chaotic" @if (old('lawchaos') == 'chaotic') CHECKED @endif>
                    <span class="inner-label">Chaotic</span>
                </label>
            </div>
            @if($errors->get('lawchaos'))
                <ul>
                    @foreach($errors->get('lawchaos') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="radio-group">
                <label class="radio-label">
                    <input name="goodevil" type="radio" id="good" value="good" @if (old('goodevil') == 'good') CHECKED @endif>
                    <span class="inner-label">Good&nbsp;&nbsp;&nbsp;</span>
                </label>
                <label class="radio-label">
                    <input name="goodevil" type="radio" id="geneutral" value="neutral" @if (old('goodevil') == 'neutral') CHECKED @endif>
                    <span class="inner-label">Neutral</span>
                </label>
                <label class="radio-label">
                    <input name="goodevil" type="radio" id="evil" value="evil" @if (old('goodevil') == 'evil') CHECKED @endif>
                    <span class="inner-label">Evil</span>
                </label>
            </div>
            @if($errors->get('goodevil'))
                <ul>
                    @foreach($errors->get('goodevil') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="form-row submit">
            <input type="submit" value="Create Character" class="submit">
        </div>
    </form>
</div>
@endsection
