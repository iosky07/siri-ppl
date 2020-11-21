<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Denah Sawah Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Denah Sawah</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.map.index') }}">Buat Denah Sawah Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:form-map action="create" />
    </div>
</x-app-layout>
