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

            <!-- Mobile Menu Button -->
            <button class="navbar-toggler btn-light text-white " type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">
                <span class="navbar-toggler-icon text-white "></span>
            </button>

            <!-- Desktop Navigation -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-1 mx-xl-4">
                        <a class="nav-link font_mulish text-white" href="/">Home</a>
                    </li>

                    @foreach ($destinations as $destination)
                        @if ($destination->id != 12)
                            @php
                                // Fetch categories and places for each destination
                                $categories = $destination->categories()->where('status',1)->get();

                                $places = $destination->places()->where('status',1)->get();
                            @endphp

                            <li class="nav-item mx-1 mx-xl-4 dropdown">
                                <a class="nav-link text-white dropdown-item d-flex  align-items-center" href="#">
                                    {{ $destination->name }}
                                    @if (count($categories))
                                    &nbsp;<i class="fas fa-caret-down"></i>
                                @endif
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach ($places as $place)
                                        @php
                                            // Fetch packages for each place
                                            $packages = $place->packages()->where('status',1)->get();
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
                                            $packages =$category->packages()->where('status',1)->get();
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

                    <li class="nav-item mx-1 mx-xl-4">
                        <a class="nav-link font_mulish text-white" href="/deals">Deals</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <a href="/book-trip" class="btn btn_darkprimary px-2 px-xl-4 py-2">PAY ONLINE</a>
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
            <li class="nav-item mx-1 mx-xl-4">
                <a class="nav-link font_mulish text-white" href="/">Home</a>
            </li>

            @foreach ($destinations as $destination)
                @if ($destination->id != 12)
                    @php
                        // Fetch categories and places for each destination
                        $categories = $destination->categories()->where('status',1)->get();

                        $places = $destination->places()->where('status',1)->get();
                    @endphp

                    <li class="nav-item mx-1 mx-xl-4 dropdown">
                        <a class="nav-link text-white dropdown-item d-flex  align-items-center" href="#">
                            {{ $destination->name }}
                            @if (count($categories))
                            &nbsp;<i class="fas fa-caret-down"></i>
                        @endif
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($places as $place)

                                <li class="dropdown-item">
                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="{{ route('package.place', ['url' => $place->url]) }}">
                                        {{ $place->name }}

                                    </a>

                                </li>
                            @endforeach

                            @foreach ($categories as $category)
                                <li class="dropdown-item">
                                    <a class="dropdown-item dropdown-item d-flex justify-content-between align-items-center" href="{{ route('package.category', ['url' => $category->url]) }}">
                                        {{ $category->name }}

                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach

            <li class="nav-item mx-1 mx-xl-4">
                <a class="nav-link font_mulish text-white" href="/deals">Deals</a>
            </li>
        </ul>
    </div>
</div>
