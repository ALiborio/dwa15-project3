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
    public static $classList = [
        'barbarian',
        'bard',
        'druid',
        'mage',
        'necromancer',
        'paladin',
        'priest',
        'ranger',
        'rogue',
        'warrior'
    ];

    /**
     * Constructor method - sets up the basic character from the Request data
     * If necessary, will also generate the character's name.
     *
     * @param  Request $request
     */
    public function __construct(Request $request)
    {
        $this->name = $request->input('name');
        $this->gender = $request->input('gender');
        $this->race = $request->input('race');
        $this->class = $request->input('class');
        if ($request->input('lawchaos') == 'neutral' && $request->input('goodevil') == 'neutral') {
            $this->alignment = 'true neutral';
        } else {
            $this->alignment = $request->input('lawchaos').' '.$request->input('goodevil');
        }
        # Generate a random name if one was not provided and the checkbox is set
        if ($this->name == '') {
            $generator = new \Nubs\RandomNameGenerator\Alliteration();
            $this->name = $generator->getName();
        }
    }

    /**
     * Get the image path for the given character class
     *
     * @return array of stats keys in order to assign rolls to
     */    
    public function getImageUrl($value='')
    {
        # "/images/human/male/ranger.png"
        $image = '/images/'.$this->race.'/'.$this->gender.'/'.$this->class.'.png';
        if (\File::exists(public_path().$image)) {
            return $image;
        } else {
            return '/images/defaultChar.png';
        }
    }

    /**
     * Actually generate the stats based on race and class
     */
    public function generateStats()
    {
        $rolls = $this->getRandomNumArray(6);
        $statOrder = $this->getStatOrder();
        $this->setupRaceBonuses();
        foreach ($statOrder as $key => $stat) {
            $this->stats[$stat] += $rolls[$key];
        }
    }

    /**
     * Get the array of random number rolls 
     * Simulates a 20-sided die
     *
     * @param  int $num
     * @return array of rolls sorted from highest to lowest
     */
    private function getRandomNumArray(int $num)
    {
        for ($i = 0; $i < $num; $i++) {
            $array[$i] = rand(1, 20);
        }
        rsort($array);
        return $array;
    }

    /**
     * Get the order to assign stats, from highest roll to lowest roll based on the character
     * class chosen.
     *
     * @return array of stats keys in order to assign rolls to
     */
    private function getStatOrder()
    {
        switch ($this->class) {
            case 'barbarian':
                $order = [
                    'strength',
                    'dexterity',
                    'constitution',
                    'intelligence',
                    'wisdom',
                    'charisma'
                ];
                break;

            case 'bard':
                $order = [
                    'charisma',
                    'dexterity',
                    'wisdom',
                    'intelligence',
                    'constitution',
                    'strength'
                ];
                break;

            case 'druid':
                $order = [
                    'wisdom',
                    'dexterity',
                    'intelligence',
                    'constitution',
                    'strength',
                    'charisma'
                ];
                break;

            case 'mage':
                $order = [
                    'intelligence',
                    'wisdom',
                    'constitution',
                    'charisma',
                    'dexterity',
                    'strength'
                ];
                break;

            case 'necromancer':
                $order = [
                    'wisdom',
                    'intelligence',
                    'constitution',
                    'strength',
                    'dexterity',
                    'charisma'
                ];
                break;
                
            case 'rogue':
                $order = [
                    'dexterity',
                    'charisma',
                    'strength',
                    'wisdom',
                    'intelligence',
                    'constitution'
                ];
                break;
                
            case 'paladin':
                $order = [
                    'constitution',
                    'wisdom',
                    'strength',
                    'dexterity',
                    'charisma',
                    'intelligence'
                ];
                break;
                
            case 'priest':
                $order = [
                    'wisdom',
                    'charisma',
                    'constitution',
                    'intelligence',
                    'dexterity',
                    'strength'
                ];
                break;
                
            case 'ranger':
                $order = [
                    'dexterity',
                    'constitution',
                    'strength',
                    'wisdom',
                    'charisma',
                    'intelligence'
                ];
                break;
                
            case 'warrior':
                $order = [
                    'strength',
                    'constitution',
                    'dexterity',
                    'charisma',
                    'wisdom',
                    'intelligence'
                ];
                break;

            default:
                # in case this method and the character classes fall out of sync,
                # returns the order in which they are displayed
                $order = [
                    'strength',
                    'dexterity',
                    'constitution',
                    'intelligence',
                    'wisdom',
                    'charisma'
                ];
                break;
        }
        
        return $order;
    }

    /**
     * Adds bonus stat points to select fields based on character race
     */
    private function setupRaceBonuses()
    {
        if ($this->race == 'human') {
            $this->stats['charisma'] += 1;
            $this->stats['intelligence'] += 1;
        } elseif ($this->race == 'elf') {
            $this->stats['dexterity'] += 1;
            $this->stats['wisdom'] += 1;
        } elseif ($this->race == 'dwarf') {
            $this->stats['strength'] += 1;
            $this->stats['constitution'] += 1;
        }
    }

}