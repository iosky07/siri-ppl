<?php


namespace App\Http\Livewire;


use App\Models\Map;
use App\Models\Terrace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegionTerraceForm extends Component
{
    public $mapId;
    public $action;
    public $terrace;
    public $dataId;
    public $file;


    public function render()
    {
        return view('livewire.region-terrace-form');
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $terrace = Terrace::findOrFail($this->dataId);

            $this->terrace = [
                "node" => $terrace->node,
                "coordinate" => $terrace->coordinate,
                "width" => $terrace->width,
                "height" => $terrace->height,
                "plant" => $terrace->plant,
            ];
        }
    }

    public function create()
    {
        $this->terrace['map_id']=$this->mapId;
        $user =Map::whereId($this->mapId)->pluck('user_id');
        $this->terrace['user_id'] = $user[0];
//        dd($this->terrace['user_id']);
        Terrace::create($this->terrace);

        $this->reset('terrace');
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
//        dd($this->mapId);
        return redirect(route('admin.map.show', $this->mapId));
//        $this->emit('redirect');
    }

    public function getRules(){
        if ($this->action=="create"){
            $rules=[
                'terrace.node' => ' required|max:256',
                'terrace.width' => 'required',
                'terrace.height' => 'required',
                'terrace.plant' => 'required',
            ];
        }else{
            $rules=[
                'terrace.node' => ' required|max:256',
                'terrace.width' => 'required',
                'terrace.height' => 'required',
                'terrace.plant' => 'required',
            ];
        }
        return $rules;
    }

    public function update() {
        $this->resetErrorBag();
        $this->validate();

//        Map::find($this->mapId);
        Terrace::find($this->dataId)->update($this->terrace);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
//        dd($this->mapId);
//        return redirect(route('admin.map.show', $this->mapId));
        $this->emit('redirect');
    }
}
