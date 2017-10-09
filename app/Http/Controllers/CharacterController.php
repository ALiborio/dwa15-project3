<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
    	return "Show form to collect info";
    }

    public function generateCharacter()
    {
    	return "At this step we would generate the character.";
    	# redirect to character sheet
    }
}
