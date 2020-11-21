<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Artikel Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">User</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Buat Artikel Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:blog-form action="create" />
    </div>
</x-app-layout>
