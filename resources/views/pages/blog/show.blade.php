<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Artikel') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Artikel</a></div>
            <div class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Lihat Artikel</a></div>
        </div>
        </div>
        <div class="section-body">
            @foreach($blogs as $data)
                <div class="form-group col-span-6 sm:col-span-5">
{{--                    ID : {{$data->id}}<br>--}}
                    Judul : {{$data->title}}<br>
                    Penulis : {{$data->writter}}<br>
                    Tanggal Publikasi : {{$data->publish_date}}<br>
                    Konten : {{$data->content}}<br>
                    Publisher : {{$data->publisher}}
                </div>
            @endforeach
            {{--        <livewire:create-user action="showUser" :userId="request()->user" />--}}
        </div>
    </x-slot>

</x-app-layout>
