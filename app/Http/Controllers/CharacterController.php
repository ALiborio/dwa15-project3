<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	        'name' => 'required',
	        'class' => 'required',
	        'race' => 'required',
	        'lawchaos' => 'required',
	        'goodevil' => 'required'
	    ]);
    	# validation passed, generate character array
    	$character = [
    		'name' => $request->input('name'),
    		'gender' => $request->input('gender'),
    		'race' => $request->input('race'),
    		'class' => $request->input('class')
    	];
    	if ($request->input('lawchaos') == 'neutral' && $request->input('goodevil') == 'neutral') {
    		$character['alignment'] = 'neutral';
    	} else {
    		$character['alignment'] = $request->input('lawchaos').' '.$request->input('goodevil');
    	}
    	$character['strength'] = rand(1, 20);
		$character['dexterity'] = rand(1, 20);
		$character['intelligence'] = rand(1, 20);
		$character['constitution'] = rand(1, 20);
		$character['charisma'] = rand(1, 20);
		$character['wisdom'] = rand(1, 20);
		# Generate a random name if one was not provided and the checkbox is set
		if ($request->has('generatename') && ($character['name'] == '')) {
			$generator = new \Nubs\RandomNameGenerator\Alliteration();
			$character['name'] = $generator->getName();
		}
    	return view('sheet')->with(['character' => $character]);
    }
}
