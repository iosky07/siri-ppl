<?php

namespace App\Http\Livewire;

use App\Models\Map;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormMap extends Component
{
    use WithFileUploads;

    public $action;
    public $data;
    public $dataId;
    public $file;


    public function render()
    {
        return view('livewire.form-map');
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $map = Map::findOrFail($this->dataId);

            $this->data = [
                "village" => $map->village,
                "map_picture" => $map->map_picture,
            ];
        }
    }

    public function create()
    {
        $this->data['slug']=Str::slug($this->data['village']);
//        $this->data['user_id']=Auth::id();
//        Auth itu mengambil semua data yang aktif
        $this->data['map_picture'] = md5($this->data['village']).'.'.$this->file->getClientOriginalExtension();
        $this->file->storeAs('public/map', $this->data['map_picture']);
//        unset($this->data['thumbnail_photo']);
        Map::create($this->data);

        $this->reset('data');
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
    }

    public function getRules(){
        if ($this->action=="create"){
            $rules=[
                'data.village' => ' required|max:256',
                'file' => 'required'
            ];
        }else{
            $rules=[
                'data.village' => ' required|max:256',
                'file' => 'required'
            ];
        }
        return $rules;
    }

    public function update() {
        $this->resetErrorBag();
        $this->validate();


        $this->data['map_picture'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
        if ($this->file !=null){
            $this->file->storeAs('public/map/', $this->data['map_picture']);
        }
//        dd($this->dataId);

        Map::find($this->dataId)->update($this->data);

//        dd($bro);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }
}
