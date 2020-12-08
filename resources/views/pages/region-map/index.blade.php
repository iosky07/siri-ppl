<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Region Sawah') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Region Sawah</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.region-map.index') }}">Region Sawah</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="region-map" :model="$region" />
    </div>
</x-app-layout>
