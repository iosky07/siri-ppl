<div>
    <div class="row">
        <div class="col-md-6">
            {!! $some !!}
        </div>
        <div class="col-md-6">
            <form wire:submit.prevent="submit">
                <h4 class="text-center font-weight-bold"><b>GAMBAR DENAH SAWAH</b></h4>
                <img src="{{asset('storage/map/'.$map_picture)}}" alt="">
                <br>
                <b>Pilih Node Awal</b>
                <select type="number" wire:model="start.node_start" class="form-control" required>
{{--                    @error('start.node_start') <span class="error">{{ $message }}</span> @enderror--}}
                    <option value="">--Pilih Data--</option>
                    @foreach($terraces as $t)
                    <option value="{{$t->coordinate}}">{{$t->node}}</option>
                    @endforeach

                </select>
                <br>
                <b>Pilih Node Tujuan</b>
                <select type="number" wire:model="end.node_end" class="form-control" required>
                    <option value="">--Pilih Data--</option>
                    @foreach($terraces as $t)
                        <option value="{{$t->coordinate}}">{{$t->node}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Cari Rute</button>
            </form>
        </div>
    </div>
</div>
