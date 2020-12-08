<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Judul')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="blog.title" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Penulis')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="blog.writter" required/>
        </div>

{{--        <div class="form-group col-span-6 sm:col-span-5">--}}
{{--            <label for="name">{{__('Tanggal Publikasi')}}</label>--}}
{{--            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"--}}
{{--                   wire:model="blog.publish_date" required/>--}}
{{--        </div>--}}

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Isi Konten')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="blog.content" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Publisher')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="blog.publisher" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.blog.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.blog.create')}}"; //will redirect to your blog page (an ex: blog.html)
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
    <script type="text/javascript">
        function Datepicker() {
            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD H:mm'
            }).on("dp.change", function (e) {
            @this.set('pay_date', e.date);
            });
        };
        window.addEventListener('turbolinks:load', Datepicker);
    </script>
</div>
