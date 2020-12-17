<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">

        {{--        <div class="form-group col-span-6 sm:col-span-5">--}}
        {{--            <label for="name">{{__('ID Map')}}</label>--}}
        {{--            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"--}}
        {{--                   value="{{$mapId}}" disabled/>--}}
        {{--        </div>--}}

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Node')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="terrace.node" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Titik Koordinat')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="terrace.coordinate" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Lebar')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="terrace.width" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Panjang')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="terrace.height" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Tanaman')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="terrace.plant" required/>
        </div>


        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
{{--    <script>--}}
{{--        document.addEventListener('livewire:load', function () {--}}
{{--            window.livewire.on('redirect',function (){--}}
{{--                window.location = "{{route('admin.map.index')}}";--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--    document.addEventListener('livewire:load', function () {--}}
{{--        window.livewire.on('redirect', () => {--}}
{{--            setTimeout(function () {--}}
{{--                window.location.href = "{{route('admin.map.create')}}"; //will redirect to your blog page (an ex: blog.html)--}}
{{--            }, 2000); //will call the function after 2 secs.--}}
{{--        });--}}
{{--    });--}}
{{--    </script>--}}
</div>



