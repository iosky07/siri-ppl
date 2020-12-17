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
        <img src="{{ asset('storage/map/'.$map->map_picture) }}" alt="">

        <a role="button" class="btn btn-primary" href="{{route('admin.map.create-terrace', $map->id)}}" style="margin-bottom: 30px; margin-top: 30px">Tambah Petak</a>
{{--        <livewire:table.main name="region-terrace" :model="$map" />--}}
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Node</th>
                <th scope="col">Titik Koordinat</th>
                <th scope="col">Width</th>
                <th scope="col">Height</th>
                <th scope="col">Tanaman</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($map->terraces as $t)
                <tr>
                    <td>{{$t->node}}</td>
                    <td>{{$t->coordinate}}</td>
                    <td>{{$t->width}}</td>
                    <td>{{$t->height}}</td>
                    <td>{{$t->plant}}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.map.edit-terrace', $t->id) }}" class="btn btn-warning"><i class="fa fa-pen"></i> Edit</a>
                        {{--                        <a role="button" href="{{ route('admin.test.show', $test->id) }}" class="mr-3"><i class="fa fa-16px fa-eye"></i></a>--}}
                        <a role="button" href="{{ route('admin.map.delete-terrace', $t->id) }}" class="btn btn-danger"><i class="fa fa-16px fa-trash"></i> Hapus</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
