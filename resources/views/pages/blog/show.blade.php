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
                <div class="section-body">
                    <h2 class="section-title"> {{$data->title}}</h2>
                   <div class="card">
                        <div class="card-header" >
                            <h4 class="col-lg-6"></h4><h5 class="col-lg-6 text-right">Tanggal Publikasi : {{$data->publish_date}}</h5>
                        </div>
                        <div class="card-body">
                            <p>{!! $data->content !!}</p>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <h5>Penulis : {{$data->writter}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--        <livewire:create-user action="showUser" :userId="request()->user" />--}}
        </div>
    </x-slot>

</x-app-layout>
