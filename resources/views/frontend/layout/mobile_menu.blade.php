<style>
    .dropend {
        /*height: 35px!important;*/
    }

    .custom-fs-22 {
        font-size: 22px
    }
</style>
@if (Request()->segment(1) == '')
    <style>
        .dropend:nth-child(4) {
            /*margin-bottom: 22px!important;*/
        }
    </style>
@endif
<nav class="navbar navbar-expand-lg navbar-light bg-light  shadow d-block d-md-none">
    <div class="container-fluid">

        <div class="d-md-none d-block w-100">
            <div class="d-flex w-100 justify-content-between  py-2 align-items-center">
                <a href="{{ route('/') }}" class="">
                    <img src="{{ getImageurl($website->image) }}" alt="Logo" class="img-fluid   w-50">
                </a>

                @if (Request::segment(1) != null)
                    <div class=" text-dark d-block d-md-none mx-3">
                        <a href="#" id="search_icon"><i class="fas fa-search custom-fs-22 text-dark"></i></a>
                    </div>
                @endif


                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-content">
                    <div class="hamburger-toggle">
                        <div class="hamburger">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </button>

            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                @foreach ($destinations as $destination)

                    @if ($destination->id != 12)
                        @php
                            $categories = DB::table('categories_destinations')
                                ->where('status', 1)
                                ->orderBy('order', 'asc')
                                ->where('destination_id', $destination->id)
                                ->get();
                        @endphp
                        <li class="dropend">

                            <a href="{{ route('destination', ['url' => $destination->url]) }}" class="dropdown-item "
                                data-bs-toggle="dropdown" data-bs-auto-close="outside">{{ $destination->name }} <i
                                    class="fas fa-chevron-right"></i></a>

                            @if (count($categories) > 0)
                                <ul class="dropdown-menu ">
                                    @foreach ($categories as $category)
                                        @php
                                            $packages = DB::table('packages')
                                                ->where('status', 1)
                                                ->where('destination_id', $destination->id)
                                                ->where('category_destination_id', $category->id)
                                                ->limit(6)
                                                ->get();
                                        @endphp
                                        <li class="dropend">
                                            <a href="{{ route('package.category', ['url' => $category->url]) }}"
                                                class="dropdown-item " data-bs-toggle="dropdown">{{ $category->name }}
                                                <i class="fas fa-chevron-right"></i></a>
                                            </a>

                                            @if (count($packages))
                                                <ul class="dropdown-menu dropdown-submenu ">
                                                    @foreach ($packages as $package)
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('package.detail', ['url' => $package->url]) }}">{{ $package->name }}</a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            @endif

                                        </li>
                                    @endforeach


                                </ul>
                            @endif

                        </li>
                    @endif

                @endforeach

                <li><a class="dropdown-item" href="{{ route('cms.page', ['page' => 'about-us']) }}">About</a></li>
                <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a></li>

                <li><a class="dropdown-item" href="{{ route('contactus') }}">Contact</a></li>
                <li><a class="dropdown-item" href="{{ route('deals') }}">Deals</a></li>

                <li>
                    <a class=" mx-3 btn btn-primary btn-xs mt-1 click_to_get_quick_trip" href="{{ route('booking.online') }}">
                        Pay Online
                    </a>
                </li>
            </ul>


        </div>

    </div>
    <div class="search_box py-2   d-none">
        <form action="{{ route('search') }}" method="GET" class="desktop_search px-4 mx-2">
            <div class="row py-1 pt-2">
                <div class="col-9 px-0">
                    <div class="form-group">

                        <input type="search" id="" class="form-control btn_primary border-0 outline-none"
                            placeholder="Enter your keyword ..." name="keyword">
                    </div>
                </div>

                <div class="col-3 text-right px-0">
                    <button class=" btn_primary btn-small rounded btn btn-primary">
                        Search
                    </button>
                </div>

            </div>

        </form>
    </div>
</nav>
