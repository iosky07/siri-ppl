<div>
    <x-data-table :data="$data" :model="$maps">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'name'])
                </a></th>
{{--                <th><a wire:click.prevent="sortBy('map_picture')" role="button" href="#">--}}
{{--                    Denah Sawah--}}
{{--                        @include('components.sort-icon', ['field' => 'map_picture'])--}}
{{--                </a></th>--}}
{{--                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">--}}
{{--                    Tanggal Dibuat--}}
{{--                    @include('components.sort-icon', ['field' => 'created_at'])--}}
{{--                </a></th>--}}
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($maps as $map)
                <tr x-data="window.__controller.dataTableController({{ $map->id }})">
                    <td>{{ $map->id }}</td>
                    <td>{{ $map->name }}</td>
{{--                    <td><img src="{{ asset('storage/map/'.$map->map_picture) }}" alt="" style="max-height: 100px"></td>--}}
{{--                    <td>{{ $map->created_at->format('d M Y H:i') }}</td>--}}
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.region-terrace.show',$map->id) }}" class="btn btn-outline-primary">Lihat</i></a>
{{--                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>--}}
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
