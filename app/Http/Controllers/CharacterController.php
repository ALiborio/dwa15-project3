<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
    	return view('form');
    }

    public function generateCharacter()
    {
    	# for now, just set up the basic character from $_GET
    	# TODO: Add form validation and stat generation based on race and class
    	$character = [
    		'name' => $_GET['name'],
    		'gender' => $_GET['gender'],
    		'race' => $_GET['race'],
    		'class' => $_GET['class']
    	];
    	if ($_GET['lawchaos'] == 'neutral' && $_GET['goodevil'] == 'neutral') {
    		$character['alignment'] = 'neutral';
    	} else {
    		$character['alignment'] = $_GET['lawchaos'].' '.$_GET['goodevil'];
    	}
    	$character['strength'] = rand(1, 20);
		$character['dexterity'] = rand(1, 20);
		$character['intelligence'] = rand(1, 20);
		$character['constitution'] = rand(1, 20);
		$character['charisma'] = rand(1, 20);
		$character['wisdom'] = rand(1, 20);
		# Generate a random name if one was not provided and the checkbox is set
		if (isset($_GET['generatename']) && ($character['name'] == '')) {
			$generator = new \Nubs\RandomNameGenerator\Alliteration();
			$character['name'] = $generator->getName();
		}
    	return view('sheet')->with(['character' => $character]);
    }
}
