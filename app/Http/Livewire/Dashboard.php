<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AStar;
use Livewire\Component;

class Dashboard extends Component
{
    public $some;
    public $start;
    public $end;
    public $x;
    public $y;

    public function mount(){
        $config = array(
            'start' => array(2,2),
            'end' => array(2,2),
            'x' => 30,
            'y' => 20,
            'disable_num' => 70,
        );
        $a = new aStar($config['start'], $config['end'], $config['x'], $config['y'], $config['disable_num']);
        $this->some = $a->displayPic();
    }

    public function submit()
    {
        $config = array(
            'start' => array($this->start['x'], $this->start['y']),
            'end' => array($this->end['x'], $this->end['y']),
            'x' => 30,
            'y' => 20,
            'disable_num' => 70,
        );
        $a = new aStar($config['start'], $config['end'], $config['x'], $config['y'], $config['disable_num']);
        $this->some = $a->displayPic();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
