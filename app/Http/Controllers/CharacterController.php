<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Characters\Character;

class CharacterController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function generateCharacter(Request $request)
    {
        $messages = [
            'name.required_without' => 'Name is required, unless Generate a Random Name is checked.',
            'generatename.required_without' => 'Generate a Random name must be checked, unless you specify a name.',
            'class.required' => 'You must pick a character class.',
            'race.required' => 'You must pick your character\'s race.',
            'lawchaos.required' => 'The lawful/chaotic alignment is required.',
            'goodevil.required' => 'The good/evil alignment is required.'
        ];
        $rules = [
            'name' => 'required_without:generatename',
            'generatename' => 'required_without:name',
            'class' => 'required',
            'race' => 'required',
            'lawchaos' => 'required',
            'goodevil' => 'required'
        ];
        # first validate
        $this->validate($request, $rules, $messages);
        # validation passed, generate character objet
        $character = new Character($request);
        $character->generateStats();
        return view('sheet')->with(['character' => $character]);
    }
}
