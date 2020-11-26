<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Verifikasi Data Petugas Irigasi') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Data Petugas Irigasi</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.user-verification.index') }}">Verifikasi Data</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user-verification" :model="$user" />
    </div>
</x-app-layout>
