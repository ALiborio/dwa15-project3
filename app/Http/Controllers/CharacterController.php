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
    	# TODO: Add logic for name generation (if applicable),
    	#       form validation, and stat generation
    	$character = [
    		'name' => $_GET['name'],
    		'gender' => $_GET['gender'],
    		'race' => $_GET['race'],
    		'class' => $_GET['class'],
    		'alignment' => $_GET['lawchaos'].' '.$_GET['goodevil'],
    		'strength' => '7',
    		'dexterity' => '10',
    		'intelligence' => '5',
    		'constitution' => '8',
    		'charisma' => '3',
    		'wisdom' => '4'
    	];
    	return view('sheet')->with(['character' => $character]);
    }
}
