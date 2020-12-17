<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Lihat User') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Lihat User</a></div>
        </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <b>
                        <div class="row">
                            <div class="col-md-2">ID Petugas</div>
                            <div class="">:</div>
                            <div class="col-md-9">{{$data->id}}</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                            <div class="col-md-2">Nama</div>
                            <div class="">:</div>
                            <div class="col-md-9">{{$data->name}}</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                            <div class="col-md-2">Email</div>
                            <div class="">:</div>
                            <div class="col-md-9">{{$data->email}}</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                            <div class="col-md-2">NIK</div>
                            <div class="">:</div>
                            <div class="col-md-9">{{$data->nik}}</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                            <div class="col-md-2">Alamat</div>
                            <div class="">:</div>
                            <div class="col-md-9">{{$data->address}}</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                            <div class="col-md-2">Nomor HP</div>
                            <div class="">:</div>
                            <div class="col-md-9">{{$data->nomor_hp}}</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                            <div class="col-md-2">Status</div>
                            <div class="">:</div>
                            <div class="col-md-9">{{$data->status}}</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                        </div>
                    </b>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
