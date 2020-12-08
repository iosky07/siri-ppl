<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Pilih Desa')}}</label>
{{--            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"--}}
{{--                   wire:model="data.village" required/>--}}

                <select name="role" id="role" wire:model="data.village" class="form-control">
                    <option value="#">--Pilih Data--</option>
                    <option value="Cakru">Cakru</option>
                    <option value="Wonorejo">Wonorejo</option>
                    <option value="Kencong">Kencong</option>
                    <option value="Kraton">Kraton</option>
                    <option value="Paseban">Paseban</option>
                </select>

        </div>
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Gambar Denah')}}</label>
            <input id="name" type="file" class="mt-1 block w-full form-control shadow-none"
                   wire:model="file" required/>
        </div>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.map.index')}}";
            });
        });
    </script>
    <script>
    document.addEventListener('livewire:load', function () {
        window.livewire.on('redirect', () => {
            setTimeout(function () {
                window.location.href = "{{route('admin.map.create')}}"; //will redirect to your blog page (an ex: blog.html)
            }, 2000); //will call the function after 2 secs.
        });
    });
    </script>
</div>



