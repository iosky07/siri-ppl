<div>
    <x-data-table :data="$data" :model="$maps">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('village')" role="button" href="#">
                    Name
                    @include('components.sort-icon', ['field' => 'village'])
                </a></th>
                <th><a wire:click.prevent="sortBy('map_picture')" role="button" href="#">
                    Denah Sawah
                        @include('components.sort-icon', ['field' => 'map_picture'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($maps as $map)
                <tr x-data="window.__controller.dataTableController({{ $map->id }})">
                    <td>{{ $map->village }}</td>
                    <td><img src="{{ asset('storage/map/'.$map->map_picture) }}" alt="" style="max-height: 100px"></td>
                    <td>{{ $map->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.map.edit', $map->id) }}" class="btn btn-warning"><i class="fa fa-16px fa-pen"></i> Edit</a>
                        <a role="button" href="{{ route('admin.map.show', $map->id) }}" class="btn btn-primary"><i class="fa fa-16px fa-eye"></i> Lihat</a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#" class="btn btn-danger"><i class="fa fa-16px fa-trash"></i> Hapus</a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
