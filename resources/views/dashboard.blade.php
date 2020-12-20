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
            <div class="card">
                <div class="card-header">
                    <h4 class="col-lg-6">INI ADALAH DASBOR ADMIN</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                        Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.</p>
                    <br>
                    <p class="card-text">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                        in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                        McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more
                        obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the
                        word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                        1.10.32 and 1.10.33 of
                        "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.
                        This book is a treatise on the theory of ethics, very popular during the Renaissance. The first
                        line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                </div>
                <div class="card-footer text-muted">
                    ini footer
                </div>
            </div>
        @endif
        @if(Auth::user()->role==2 and Auth::user()->status=='aktif')
            <div class="card">
                <div class="card-header">
                    <h4 class="col-lg-6">PENCARIAN RUTE IRIGASI</h4>
                </div>
                <div class="card-body">
                    <livewire:dashboard/>
                    {{--                        <div class="col-md-6" style="margin-right: auto">Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</div>--}}
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>
            {{--            <div>--}}
            {{--                <div style="float: left; width: 50%; padding: 20px; height: 300px;">--}}
            {{--                    <img src="{{asset('storage/map/bef527387cc1a5ae1cd313d04aefa7dd3f8afeb6.jpg')}}" class="rounded float-left">--}}
            {{--                </div>--}}
            {{--                <div style="float: left; padding: 20px; width: 50%; height: 300px;">--}}
            {{--                    <form class="form-group col-md-12">--}}
            {{--                        <div class="form-group col-md-12">--}}
            {{--                            <label for="exampleInputEmail1">Input 1</label>--}}
            {{--                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">--}}
            {{--                        </div>--}}
            {{--                        <div class="form-group col-md-12">--}}
            {{--                            <label for="exampleInputPassword1">Input 2</label>--}}
            {{--                            <input type="text" class="form-control" id="exampleInputPassword1">--}}
            {{--                        </div>--}}

            {{--                        <button type="submit" class="btn btn-primary">Submit</button>--}}
            {{--                    </form>--}}
            {{--                </div>--}}
{{--    </div>--}}
        @endif

        @if(Auth::user()->role==2 and Auth::user()->status==NULL)
                <div class="card">
                    <div class="card-header">
                        <h4 class="col-lg-6">PENCARIAN RUTE IRIGASI</h4>
                    </div>
                    <div class="card-body">
{{--                        <livewire:dashboard/>--}}
                        {{--                        <div class="col-md-6" style="margin-right: auto">Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</div>--}}
                    </div>
                    <div class="card-footer text-muted">
                        2 days ago
                    </div>
                </div>
        @endif

        @if(Auth::user()->role==3)
            Akun Anda Belum Terverifikasi
        @endif
        </div>
</x-app-layout>
