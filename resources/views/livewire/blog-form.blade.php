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

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('Isi Konten')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote" class="form-control summernote" required>
                    {{$blog['content']}}
                </textarea>
            </div>
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
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {

            $('.summernote').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function (contents, $editable) {
                    @this.set('blog.content', contents)
                    }
                }

            })
        });
    </script>
</div>
