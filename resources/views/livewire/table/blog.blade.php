<div>
    <x-data-table :data="$data" :model="$blogs">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                    Judul
                    @include('components.sort-icon', ['field' => 'title'])
                </a></th>
                <th><a wire:click.prevent="sortBy('writter')" role="button" href="#">
                    Penulis
                        @include('components.sort-icon', ['field' => 'writter'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($blogs as $blog)
                <tr x-data="window.__controller.dataTableController({{ $blog->id }})">
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->writter }}</td>
                    <td>{{ $blog->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('admin.blog.show', $blog->id) }}" class="btn btn-primary"><i class="fa fa-16px fa-eye"></i> Lihat</a>
                        @if(Auth::user()->role==1)
                        <a role="button" href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning"><i class="fa fa-16px fa-pen"></i> Edit</a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#" class="btn btn-danger"><i class="fa fa-16px fa-trash"></i> Hapus</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
