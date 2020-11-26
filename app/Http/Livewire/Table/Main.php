<?php

namespace App\Http\Livewire\Table;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;
    public $userId;
    public $user;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item", "verifyItem" => "verification_item" ];
//    protected $verification = [  ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.user.create'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'user-verification':
                $users = $this->model::searchVerify($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user-verification',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.user-verification.create'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'blog':
                $blogs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.blog',
                    "blogs" => $blogs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.blog.create'),
                            'create_new_text' => 'Buat Artikel Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

                case 'map':
                $maps = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.map',
                    "maps" => $maps,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.map.create'),
                            'create_new_text' => 'Buat Denah Sawah',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }

//    public function delete_item ($id)
//    {
//        $data = $this->model::find($id);
//
//        if (!$data) {
//            $this->emit("deleteResult", [
//                "status" => false,
//                "message" => "Gagal menghapus data " . $this->name
//            ]);
//            return;
//        }
//
//        $data->delete();
//        $this->emit("deleteResult", [
//            "status" => true,
//            "message" => "Data " . $this->name . " berhasil dihapus!"
//        ]);
//    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menemukan data " . $this->name
            ]);
            return;
        }

//        $data->update('status', '=', 'aktif');
        $data->where('status', 'NULL')->update(array('status' => 'aktif'));
//        dd($a);
//        User::query()
//            ->where('id', $this->userId)
//            ->update($)->whereStatus('aktif');

        $this->emit("deleteResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
