@php
    $links=[
        [
            "href" => "admin.dashboard",
            "text" => "Dashboard",
            "is_multi" => false,
        ]
        ];
    if (Auth::user()->role==1){
    $add =
        [
            "href" => [
                [
                    "section_icon"=> "fas fa-users",
                    "section_text" => "Petugas Irigasi",
                    "section_list" => [
                        ["href" => "admin.user-verification.index", "text" => "Verifikasi Petugas Irigasi"],
                        ["href" => "admin.user.index", "text" => "Data Petugas Irigasi"]
                    ]
                ],
                [
                    "section_icon"=> "fas fa-file",
                    "section_text" => "Artikel",
                    "section_list" => [
                        ["href" => "admin.blog.index", "text" => "Data Artikel"],
                        ["href" => "admin.blog.create", "text" => "Buat Artikel"]
                    ]
                ],
                [
                    "section_icon"=>"fas fa-chart-bar",
                    "section_text" => "Denah Sawah",
                    "section_list" => [
                        ["href" => "admin.map.index", "text" => "Data Denah"],
                        ["href" => "admin.map.create", "text" => "Buat Denah"]
                ]
               ]
            ],
            "text" => "Manajemen",
            "is_multi" => true,
        ];
        array_push($links, $add);
    }
    $navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">SIRI</a>
{{--            {{Auth::user()->role==1 ? "Admin":'Bukan Admin'}}--}}
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
            <ul class="sidebar-menu">
                <li class="menu-header">{{ $link->text }}</li>
                @if (!$link->is_multi)
                    <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($link->href) }}"><i
                                class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                @else
                    @foreach ($link->href as $section)
                        @php
                            $routes = collect($section->section_list)->map(function ($child) {
                                return Request::routeIs($child->href);
                            })->toArray();

                            $is_active = in_array(true, $routes);
                        @endphp

                        <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="{{$section->section_icon}}"></i> <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link"
                                                                                                        href="{{ route($child->href) }}">{{ $child->text }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endforeach
    </aside>
</div>
