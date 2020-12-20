<div>
    <div class="row">
        <div class="col-md-6">
{{--            {!! $some[1] !!}--}}
            @if(Auth::user()->status=='aktif')
            {!! $some[0] !!}
            @endif
        </div>
        <div class="col-md-6">
            <form wire:submit.prevent="submit">
                <h4 class="text-center font-weight-bold"><b>GAMBAR DENAH SAWAH</b></h4>
                @if(Auth::user()->status=='aktif')
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
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>HASIL PENCARIAN RUTE :</b>
                    <br>
                    <br>
                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-md-3">Total Jarak</div>
                            <div class="">:</div>
                            <div class="col-md-4">{{ ($some[1])?$some[1].' meter':'-' }} </div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                            <div class="col-md-3">Estimasi Waktu</div>
                            <div class="">:</div>
                            <div class="col-md-4">masih progres</div>
                            <div class="w-100" style="margin-bottom: 15px"></div>
                        </div>
                    </div>

                @endif
            </form>
        </div>
    </div>
</div>
