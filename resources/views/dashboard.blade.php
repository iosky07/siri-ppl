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
        @if(Auth::user()->role!=1)
            <div>
                <div style="float: left; width: 50%; padding: 20px; height: 300px;">
                    <img src="{{asset('storage/map/0df01ae7dd51cec48fed56952f40842b.png')}}" class="rounded float-left">
                </div>
                <div style="float: left; padding: 20px; width: 50%; height: 300px;">
                    <form class="form-group col-md-12">
                        <div class="form-group col-md-12">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group col-md-12">
                            <div>
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">1</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">2</label>
                            </div>
                            <div>
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing">3</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            @endif
    </div>
</x-app-layout>
