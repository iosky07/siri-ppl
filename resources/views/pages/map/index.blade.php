<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Denah Sawah') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Denah Sawah</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.map.index') }}">Denah Sawah</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="map" :model="$map" />
    </div>
</x-app-layout>
