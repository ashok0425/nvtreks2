<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Info -->
        <div class="user-panel mt-3 pb-3 mb-3">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ getImageUrl(setting()->image) }}" alt="Admin Logo" style="width:100px" class="bg-white">
            </a>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class=" fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <div class="dropdown-divider"></div>


                <li class="nav-item">
                    <a href="{{ route('admin.destinations.index') }}" class="nav-link">
                        <i class=" fas fa-map-marker-alt"></i>
                        <p>Destinations</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.categories-places.index') }}" class="nav-link">
                        <i class=" fas fa-map"></i>
                        <p>Places</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.categories-destinations.index') }}" class="nav-link">
                        <i class=" fas fa-list"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.packages.index') }}" class="nav-link">
                        <i class=" fas fa-box"></i>
                        <p>Packages</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.departures.index') }}" class="nav-link">
                        <i class="fas fa-clock"></i>
                        <p>Departures</p>
                    </a>
                </li>
                <div class="dropdown-divider"></div>


                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                        <i class=" fas fa-address-book"></i>
                        <p>Contacts</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.bookings') }}" class="nav-link">
                        <i class=" fas fa-users"></i>
                        <p>Booking</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ route('admin.subscriber') }}" class="nav-link">
                        <i class=" fas fa-users"></i>
                        <p>Subscriber</p>
                    </a>
                </li>

                <div class="dropdown-divider"></div>
 <li class="nav-item">
                    <a href="{{ route('admin.teams.index') }}" class="nav-link">
                        <i class=" fas fa-users"></i>
                        <p>Teams</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                        <i class="fas fa-file-image"></i>
                        <p>Blogs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                        <i class=" fas fa-comment-dots"></i>
                        <p>Testimonials</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                        <i class=" fas fa-question-circle"></i>
                        <p>FAQs</p>
                    </a>
                </li>
                <div class="dropdown-divider"></div>

                <li class="nav-item">
                    <a href="{{ route('admin.banners.index') }}" class="nav-link">
                        <i class=" fas fa-images"></i>
                        <p>Banners/Link</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.websites.index') }}" class="nav-link">
                        <i class=" fas fa-wrench"></i>
                        <p>Setting</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.events.index') }}" class="nav-link">
                        <i class=" fas fa-calendar"></i>
                        <p>Events</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.newsletters.index') }}" class="nav-link">
                        <i class=" fas fa-envelope"></i>
                        <p>Newsletters</p>
                    </a>
                </li> --}}



                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class=" fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
