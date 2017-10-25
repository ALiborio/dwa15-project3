<?php

namespace App\Characters;

use Illuminate\Http\Request;

class Character
{
	public $name;
	public $gender;
	public $race;
	public $class;
	public $alignment;
	public $stats = [
		'strength' => 0,
		'dexterity' => 0,
		'constitution' => 0,
		'intelligence' => 0,
		'wisdom' => 0,
		'charisma' => 0
	];

	public function __construct(Request $request)
	{
		$this->name = $request->input('name');
		$this->gender = $request->input('gender');
		$this->race = $request->input('race');
		$this->class = $request->input('class');
		if ($request->input('lawchaos') == 'neutral' && $request->input('goodevil') == 'neutral') {
    		$this->alignment = 'neutral';
    	} else {
    		$this->alignment = $request->input('lawchaos').' '.$request->input('goodevil');
    	}
	    # Generate a random name if one was not provided and the checkbox is set
		if ($this->name == '') {
			$generator = new \Nubs\RandomNameGenerator\Alliteration();
			$this->name = $generator->getName();
		}
	}

	public function generateStats()
	{
		$this->stats['strength'] += rand(1, 20);
		$this->stats['dexterity'] += rand(1, 20);
		$this->stats['intelligence'] += rand(1, 20);
		$this->stats['constitution'] += rand(1, 20);
		$this->stats['charisma'] += rand(1, 20);
		$this->stats['wisdom'] += rand(1, 20);
	}

}