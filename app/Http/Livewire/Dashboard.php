<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AStar;
use App\Models\Map;
use App\Models\Terrace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $some;
    public $start;
    public $end;
    public $x;
    public $y;
    public $terraces;
    public $map_picture;

    public function mount(){
        $map = Map::whereUserId(Auth::id())->pluck('map_picture');
        $this->map_picture = $map[0];
//        dd($this->map_picture[0]);
        $this->terraces = Terrace::whereUserId(Auth::id())->get();
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

//    protected $rules=[
//        'start.node_start'=> 'required',
//        'end.node_end'=> 'required'
//    ];

    public function submit()
    {
//        $this->validate();

        $start = explode(",", $this->start['node_start']);
        $end = explode(",", $this->end['node_end']);
//        dd($start);
        $config = array(
            'start' => array($start[0], $start[1]),
            'end' => array($end[0], $end[1]),
            'x' => 30,
            'y' => 20,
            'disable_num' => 70,
        );
        $a = new aStar($config['start'], $config['end'], $config['x'], $config['y'], $config['disable_num']);
        $this->some = $a->displayPic();

    }

    public function render()
    {

//        dd($terraces);
        return view('livewire.dashboard');
    }
}
