<?php


namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;

class UserVerificationForm extends Component
{
    public $action;
    public $userV;
    public $dataId;
    public $file;


    public function render()
    {
        return view('livewire.user-verification-form');
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $userV = User::findOrFail($this->dataId);

            $this->userV = [
                "name" => $userV->name,
                "email" => $userV->email,
                "password" => $userV->password,
                "role" => $userV->role,
                "nik" => $userV->nik,
                "address" => $userV->address,
                "nomor_hp" => $userV->nomor_hp,
                "status" => $userV->status,
            ];
        }
    }

//    public function create()
//    {
//        Blog::create($this->userV);
//
//        $this->reset('userV');
//        $this->emit('swal:alert', [
//            'type'    => 'success',
//            'title'   => 'Data berhasil masuk',
//            'timeout' => 3000,
//            'icon'=>'success'
//        ]);
//    }

    public function getRules(){
        if ($this->action=="create"){
            $rules=[
                'userV.title' => ' required|max:256',
                'userV.writter' => 'required',
                'userV.publish_date' => 'required',
                'userV.publisher' => 'required',
                'userV.content' => 'required'
            ];
        }else{
            $rules=[
                'userV.title' => ' required|max:256',
                'userV.writter' => 'required',
                'userV.publish_date' => 'required',
                'userV.publisher' => 'required',
                'userV.content' => 'required'
            ];
        }
        return $rules;
    }
//
//    public function update() {
//        $this->resetErrorBag();
//        $this->validate();
//
//
//        User::find($this->dataId)->update($this->userV);
//
//        $this->emit('swal:alert', [
//            'type'    => 'success',
//            'title'   => 'Data berhasil update',
//            'timeout' => 3000,
//            'icon'=>'success'
//        ]);
//        $this->emit('redirect');
//    }
}
