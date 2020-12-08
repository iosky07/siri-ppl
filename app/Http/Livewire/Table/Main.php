<?php

namespace App\Http\Livewire\Table;

use App\Models\Terrace;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
//                            'create_new' => route('admin.user.create'),
//                            'create_new_text' => 'Buat User Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
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
//                            'create_new' => route('admin.user-verification.create'),
//                            'create_new_text' => 'Buat User Baru',
//                            'export' => '#',
//                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'blog':
                $blogs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);
                if (Auth::user()->role==1) {
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
                } else {
                    return [
                        "view" => 'livewire.table.blog',
                        "blogs" => $blogs,
                        "data" => array_to_object([
                            'href' => [
//                                'create_new' => route('admin.blog.create'),
//                                'create_new_text' => 'Buat Artikel Baru',
//                                'export' => '#',
//                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                }


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

            case 'region-map':
                $maps = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.region-map',
                    "maps" => $maps,
                    "data" => array_to_object([
                        'href' => [
//                            'create_new' => route('admin.map.create'),
//                            'create_new_text' => 'Buat Region Sawah',
//                            'export' => '#',
//                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'region-terrace':
                $terraces = Terrace::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.region-terrace',
                    "terraces" => $terraces,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('admin.region-terrace.create'),
                            'create_new_text' => 'Buat Petak Sawah',
//                            'export' => '#',
//                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
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
    public function verification_item($id){

        $data = $this->model::find($id);
        User::find($data->id)->update(['role'=>2, 'status'=>'aktif']);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menemukan data " . $this->name
            ]);
            return;
        }

//        $data->update('status', '=', 'aktif');

//        $this->model->whereId($id)->whereStatus(NULL)->update(array('status' => 'aktif', 'role' => '2'));
//        dd($a);
//        User::query()
//            ->where('id', $this->userId)
//            ->update($)->whereStatus('aktif');

        $this->emit("verifyResult", [
            "status" => true,
            "message" => "Data " . $this->name . " berhasil diverifikasi!"
        ]);
    }
}
