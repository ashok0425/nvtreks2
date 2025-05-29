@php
    $setting = DB::table('websites')->first();
    $destinations = App\Models\Destination::with([
    'categories:id,name,url',  // Load categories with specific columns
    'packages:id,name,url',     // Load packages with specific columns
    'places:id,name,url',       // Load places with specific columns

])->where('status', 1)
->get();
@endphp
<div class="navbar_overlay">
    <nav class="navbar navbar-expand-lg bg-transparent py-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{getImageurl($setting->image)}}" alt="Nepal Vision">
            </a>

            <a href="javascript:void(0);" id="openSearch" class="ml-auto ms-auto me-3 d-md-none d-inline-block mr-3">
    <i class="fas fa-search h4 text-white"></i>
</a>
            <!-- Mobile Menu Button -->
            <button class="navbar-toggler btn-light text-white " type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">
                <span class="navbar-toggler-icon text-white "></span>
            </button>

            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-0 mx-xl-4">
                        <a class="nav-link font_mulish text-white" href="/">Home</a>
                    </li>

                    @foreach ($destinations as $destination)
                        @if ($destination->id != 12)
                            @php
                                // Fetch categories and places for each destination
                                $categories = $destination->categories()->orderBy('order','desc')->where('status',1)->get();

                                $places = $destination->places()->where('status',1)->get();
                            @endphp

                            <li class="nav-item mx-0 mx-xl-4 dropdown">
                                <a class="nav-link text-white dropdown-item d-flex  align-items-center" href="#">
                                    {{ $destination->name }}
                                    @if (count($categories))
                                    &nbsp;<i class="fas fa-caret-down"></i>
                                @endif
                                </a>
                                <ul class="dropdown-menu" style="z-index: 999">
                                    @foreach ($places as $place)
                                        @php
                                            // Fetch packages for each place
                                            $packages = $place->packages()->where('status',1)->orderBy('order', 'desc')->get();
                                        @endphp

                                        <li class="dropdown-item  pl-0">
                                            <a class="dropdown-item ps-0  pl-0 d-flex justify-content-between align-items-center" href="{{ route('package.place', ['url' => $place->url]) }}">
                                                {{ $place->name }}
                                                @if (count($packages))
                                                &nbsp;  &nbsp;  <i class="fas fa-caret-right"></i>
                                                @endif
                                            </a>
                                            @if (count($packages))
                                                <ul class="sub dropdown-menu">
                                                    @foreach ($packages as $package)
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('package.detail', ['url' => $package->url]) }}">
                                                                {{ $package->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach

                                    @foreach ($categories as $category)
                                        @php
                                            // Fetch packages for each category
                                            $packages =$category->packages()->orderBy('order', 'desc')->where('status',1)->get();
                                        @endphp

                                        <li class="dropdown-item  pl-0">
                                            <a class="dropdown-item ps-0  pl-0 dropdown-item d-flex justify-content-between align-items-center" href="{{ route('package.category', ['url' => $category->url]) }}">
                                                {{ $category->name }}
                                                @if (count($packages) > 0)
                                                  &nbsp;  <i class="fas fa-caret-right"></i>
                                                @endif
                                            </a>
                                            @if (count($packages))
                                                <ul class="sub dropdown-menu">
                                                    @foreach ($packages as $package)
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('package.detail', ['url' => $package->url]) }}">
                                                                {{ $package->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach

                    <li class="nav-item mx-0 mx-xl-4 position-relative">
                        <a class="nav-link font_mulish text-white" href="/deals">
                            Deals
                            <span class="ribbon">Bestseller</span>
                        </a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <a href="/book-now?type=payment" class="btn btn_darkprimary px-2 px-xl-4 py-2" >PAY ONLINE</a>
                </div>
            </div>



        </div>
    </nav>


</div>
  <!-- Mobile Offcanvas Menu -->
  <div class="offcanvas offcanvas-start bg-dark text-white w-100 vh-100" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-0 mx-xl-4">
                <a class="nav-link font_mulish text-white" href="/">Home</a>
            </li>

            @foreach ($destinations as $destination)
                @if ($destination->id != 12)
                    @php
                        $categories = $destination->categories()->where('status', 1)->get();
                        $places = $destination->places()->where('status', 1)->get();
                    @endphp

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="collapse" data-bs-target="#dest-{{ $destination->id }}">
                            {{ $destination->name }}
                        </a>
                        <ul class="collapse  bg-white list-unstyled ps-3" id="dest-{{ $destination->id }}">
                            @foreach ($places as $place)
                                @php $packages = $place->packages()->where('status',1)->get(); @endphp
                                <li>
                                    <a class="nav-link text-dark dropdown-toggle " data-bs-toggle="collapse" data-bs-target="#place-{{ $place->id }}" href="#">
                                        {{ $place->name }}
                                    </a>
                                    @if(count($packages))
                                        <ul class="collapse  bg-white list-unstyled ps-3" id="place-{{ $place->id }}">
                                            @foreach ($packages as $package)
                                                <li>
                                                    <a class="nav-link text-dark" href="{{ route('package.detail', ['url' => $package->url]) }}">{{ $package->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach

                            @foreach ($categories as $category)
                                @php $packages = $category->packages()->where('status',1)->get(); @endphp
                                <li>
                                    <a class="nav-link dropdown-toggle text-dark  bg-white" data-bs-toggle="collapse" data-bs-target="#cat-{{ $category->id }}" href="#">
                                        {{ $category->name }}
                                    </a>
                                    @if(count($packages))
                                        <ul class="collapse list-unstyled ps-3" id="cat-{{ $category->id }}">
                                            @foreach ($packages as $package)
                                                <li>
                                                    <a class="nav-link text-dark  bg-white" href="{{ route('package.detail', ['url' => $package->url]) }}">{{ $package->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach

            <li class="nav-item mx-0 mx-xl-4">
                <a class="nav-link font_mulish text-white" href="/deals">Deals</a>
            </li>
             <li class="nav-item mx-0 mx-xl-4">
                 <a href="/book-now?type=payment" class="btn btn_darkprimary px-2 px-xl-4 py-2" >PAY ONLINE</a>
             </li>

        </ul>

    </div>
</div>
<!-- Search Overlay -->
<div id="searchOverlay" class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-none" style="z-index: 1050;">
     <button class="btn position-absolute top-0 end-0 m-3 text-white" id="closeSearch" style="z-index: 1051;">
        <i class="fas fa-times fa-2x"></i>
    </button>
    <div class="container h-100 d-flex align-items-center justify-content-center">
        <div class="position-relative w-100" style="max-width: 600px;">
            <form action="{{route('search')}}">
            <input type="text" name="keyword" class="form-control form-control-lg" required placeholder="Search..." autofocus>
            <button  class="btn position-absolute top-50 end-0 translate-middle-y me-3 text-dark">
                <i class="fas fa-search fa-lg"></i>
            </button>
            </form>

        </div>
    </div>
</div>
