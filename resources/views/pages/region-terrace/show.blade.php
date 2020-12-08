<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Petak Sawah') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Petak</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.region-terrace.index') }}">Petak Sawah</a></div>
        </div>
    </x-slot>

    <div>
        <img src="{{asset('storage/map/bef527387cc1a5ae1cd313d04aefa7dd3f8afeb6.jpg')}}" alt="">
{{--        <livewire:table.main name="region-terrace" :model="$terrace" />--}}
    </div>
{{--    @foreach()--}}
</x-app-layout>
