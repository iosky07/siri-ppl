<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Petak Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Petak</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.region-terrace.index') }}">Buat Petak Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:region-terrace-form action="create" :mapId="$id" />
    </div>
</x-app-layout>
