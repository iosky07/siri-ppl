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
            @foreach($users as $data)
                <div class="form-group col-span-6 sm:col-span-5">
                    ID : {{$data->id}}<br>
                    Nama : {{$data->name}}<br>
                    Email : {{$data->email}}<br>
                    NIK : {{$data->nik}}<br>
                    Alamat : {{$data->address}}<br>
                    Nomor HP : {{$data->nomor_hp}}<br>
                    Status : {{$data->status}}
                </div>
            @endforeach
            {{--        <livewire:create-user action="showUser" :userId="request()->user" />--}}
        </div>
    </x-slot>

</x-app-layout>
