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
    	# first validate
    	$this->validate($request, [
	        'name' => 'required_without:generatename',
	        'generatename' => 'required_without:name',
	        'class' => 'required',
	        'race' => 'required',
	        'lawchaos' => 'required',
	        'goodevil' => 'required'
	    ]);
    	# validation passed, generate character objet
    	$character = new Character($request);
    	$character->generateStats();
    	return view('sheet')->with(['character' => $character]);
    }
}
