<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        @if(Auth::user()->role==1)
{{--        <x-jet-welcome />--}}
            ini dasbor admin
        @endif
        @if(Auth::user()->role==2)
            <div>
                <div style="float: left; width: 50%; padding: 20px; height: 300px;">
                    <img src="{{asset('storage/map/bef527387cc1a5ae1cd313d04aefa7dd3f8afeb6.jpg')}}" class="rounded float-left">
                </div>
                <div style="float: left; padding: 20px; width: 50%; height: 300px;">
                    <form class="form-group col-md-12">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Input 1</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputPassword1">Input 2</label>
                            <input type="text" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            @endif
            @if(Auth::user()->role==3)
                Akun Anda Belum Terverifikasi
            @endif
    </div>
</x-app-layout>
