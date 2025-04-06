<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Splide.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="./style/navbar.css">
    <link rel="stylesheet" href="./style/footer.css">
    <link rel="stylesheet" href="./style/app.css">
    <link rel="stylesheet" href="./style/home.css">

</head>

<body>
    <section class="video_section mb-md-5 mb-4">
        <!-- navbar -->
        <div class="navbar_overlay">
            <nav class="navbar navbar-expand-lg bg-transparent py-2">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="./images/logo_white.png" alt="Nepal Vision">
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
                            <li class="nav-item mx-1 mx-xl-4 font_mulish   dropdown">
                                <button class="nav-link dropdown-toggle text-white" type="button"
                                    data-bs-toggle="dropdown">
                                    Nepal
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/nepal/action">Action</a></li>
                                    <li><a class="dropdown-item" href="/nepal/another-action">Another action</a></li>
                                    <li><a class="dropdown-item" href="/nepal/something-else">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item mx-1 mx-xl-4 font_mulish   dropdown">
                                <button class="nav-link dropdown-toggle text-white" type="button"
                                    data-bs-toggle="dropdown">
                                    India
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/india/action">Action</a></li>
                                    <li><a class="dropdown-item" href="/india/another-action">Another action</a></li>
                                    <li><a class="dropdown-item" href="/india/something-else">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item mx-1 mx-xl-4 font_mulish   dropdown">
                                <button class="nav-link dropdown-toggle text-white" type="button"
                                    data-bs-toggle="dropdown">
                                    Tibet
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/tibet/action">Action</a></li>
                                    <li><a class="dropdown-item" href="/tibet/another-action">Another action</a></li>
                                    <li><a class="dropdown-item" href="/tibet/something-else">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item mx-1 mx-xl-4 font_mulish   dropdown">
                                <button class="nav-link dropdown-toggle text-white" type="button"
                                    data-bs-toggle="dropdown">
                                    Bhutan
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/bhutan/action">Action</a></li>
                                    <li><a class="dropdown-item" href="/bhutan/another-action">Another action</a></li>
                                    <li><a class="dropdown-item" href="/bhutan/something-else">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item mx-1 mx-xl-4">
                                <a class="nav-link font_mulish text-white" href="/exotic-trips">Exotic Trips</a>
                            </li>
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle text-white" type="button" data-bs-toggle="dropdown">
                            Nepal
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/nepal/action">Action</a></li>
                            <li><a class="dropdown-item" href="/nepal/another-action">Another action</a></li>
                            <li><a class="dropdown-item" href="/nepal/something-else">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle text-white" type="button" data-bs-toggle="dropdown">
                            India
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/india/action">Action</a></li>
                            <li><a class="dropdown-item" href="/india/another-action">Another action</a></li>
                            <li><a class="dropdown-item" href="/india/something-else">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/exotic-trips">Exotic Trips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/deals">Deals</a>
                    </li>
                    <li class="nav-item">
                        <a href="/book-trip" class="btn btn_darkprimary w-100 mt-3">PAY ONLINE</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="video_banner_container ">
            <video loop muted autoPlay playsInline poster='./images/herobgvideo.mp4' class="video-banner">
                <source src='./images/herobgvideo.mp4' type="video/mp4" />
            </video>
            <div class="position-absolute top-0 start-0 w-100 h-100">
                <div class="banner-container">
                    <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                        style='background-color: #000000;opacity: 20%'></div>
                    <div class="banner-content">
                        <p class="home_banner_subtitle mb-0">CELEBRATING 30 PLUS GLORIOUS YEARS OF SERVICE</p>
                        <h1 class="home_banner_title mb-md-4">NEPAL</h1>
                        <div class="home_banner_input">
                            <div class="input-group search_input">
                                <span class="input-group-text bg-white ps-3 pe-0 rounded-start-2 py-md-3"
                                    id="basic-addon1">
                                    <i class="bi bi-search fs-6 text_darkprimary"></i>

                                </span>
                                <input type="text" class="form-control border border-start-0 ps-2 py-md-3 rounded-end-2"
                                    placeholder="Find your trip.." aria-label="search"
                                    aria-describedby="basic-addon1" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <section class="container my-5">
        <!-- Section Heading -->
        <div class="row align-items-center mb-md-5 mb-3">
            <div class="col-md-7">
                <div class="section-header">
                    <hr class="section-line py-2">
                    <p class="section-subtitle">POPULAR DESTINATION</p>
                </div>
                <h2 class="head_title">TOP NOTCH DESTINATIONS</h2>
            </div>
            <div class="col-md-5">
                <p class="section-description">
                    Explore our curated list of the best countries to visit in 2024 and discover incredible destinations
                    waiting to be explored.
                </p>
            </div>
        </div>

        <!-- Destination Grid -->
        <div class="row g-3">
            <!-- First Two Columns -->
            <div class="col-12 col-md">
                <div class="card destination-card  p-0 border-0 rounded-3">
                    <img src="./images/destination4.png" alt="NEPAL" class="card-img-top rounded-3"
                        style="height: 100%;object-fit: cover;">
                    <div class="card-img-overlay destination-overlay">
                        <h5 class="destination-title bg_darkOrange">NEPAL</h5>
                        <p class="destination-description">90 Destinations</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md">
                <div class="card destination-card  p-0 border-0 rounded-3">
                    <img src="./images/destination3.png" alt="BHUTAN" class="card-img-top rounded-3"
                        style="height: 100%;object-fit: cover;">
                    <div class="card-img-overlay destination-overlay">
                        <h5 class="destination-title bg_darkOrange">BHUTAN</h5>
                        <p class="destination-description">5 Destinations</p>
                    </div>
                </div>
            </div>

            <!-- Third Column with Stacked Cards -->
            <div class="col-12 col-md-5 d-flex flex-column">
                <div class="card destination-card  p-0 border-0 rounded-3 mb-3">
                    <img src="./images/destination2.png" alt="TIBET" class="card-img-top rounded-3"
                        style="height: 100%;object-fit: cover;">
                    <div class="card-img-overlay destination-overlay">
                        <h5 class="destination-title bg_darkOrange">TIBET</h5>
                        <p class="destination-description">10 Destinations</p>
                    </div>
                </div>

                <div class="card destination-card  p-0 border-0 rounded-3">
                    <img src="./images/destination1.png" alt="INDIA" class="card-img-top rounded-3"
                        style="height: 100%;object-fit: cover;">
                    <div class="card-img-overlay destination-overlay">
                        <h5 class="destination-title bg_darkOrange">INDIA</h5>
                        <p class="destination-description">15 Destinations</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="text-center mt-4">
            <button class="btn btn_darkprimary destination-button">MORE DESTINATIONS</button>
        </div>
    </section>

    <section class="bg_lightwhite">
        <div class="container py-md-5 py-4">
            <div class="d-flex justify-content-center text-center mb-md-5 pb-md-5 mb-4">
                <div>
                    <div class="section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2">
                        <p class="section-subtitle">EXPLORE GREAT PLACES</p>
                    </div>
                    <h2 class="head_title mb-md-3">POPULAR PACKAGES</h2>
                    <p class="text_lightDark font_montserrat mb-0" style="max-width: 800px;">
                        Explore our curated list of the best countries to visit in 2024 and discover incredible
                        destinations waiting to be explored.
                    </p>
                </div>
            </div>

            <div class="row g-4 mb-4 pb-md-5">
                <!-- Trip Card 1 -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card border-0 bg-white rounded overflow-hidden hover_effect rounded-0">
                        <div class="position-relative">
                            <img src="./images/popularImg1.jpg" alt="Annapurna Base Camp Trek and Hiking"
                                class="img-fluid w-100 rounded-0">
                            <div class="badge-container position-absolute top-0 end-0 py-3 px-1">
                                <div class="badge-arrow bg_darkOrange">
                                    <i class="fas fa-crown"></i>
                                    LUXURY
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 w-100 py-2" style="background-color: #0791BE4D;">
                                <div
                                    class="d-flex justify-content-center align-items-center gap-2 text-white fw-bold mb-0">
                                    <i class="far fa-clock"></i> 14 DAYS
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-md-3 mb-2">
                                <div class="d-flex text_darkGray font_montserrat gap-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p class="mb-0 small">Kaski Nepal</p>
                                </div>
                                <div class="d-flex align-items-center text_darkGray font_montserrat gap-2">
                                    <img src="./images/speedmetereasyImg.png" alt="Speed Meter Easy" width="32"
                                        height="32">
                                    <p class="mb-0 small">Easy</p>
                                </div>
                            </div>
                            <h5 class="popular_card_head mb-md-4 mb-3 text-start">Annapurna Base Camp Trek and Hiking
                            </h5>
                            <div class="d-flex align-items-center gap-1 mb-md-4 mb-3">
                                <span class="small text_darkGray">(25 reviews)</span>
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div
                                class="d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-3">
                                <div>
                                    <span class="fw-bold text_lightGrey">From </span>
                                    <span class="text_lightGreen fw-bolder">$140 </span>
                                    <span class="text_lightGrey text-decoration-line-through">$165</span>
                                </div>
                                <button class="btn btn_darkprimary rounded-0 px-3">VIEW DETAILS</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trip Card 2 -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card border-0 bg-white rounded overflow-hidden hover_effect rounded-0">
                        <div class="position-relative">
                            <img src="./images/popularImg1.jpg" alt="Annapurna Base Camp Trek and Hiking"
                                class="img-fluid w-100 rounded-0">
                            <div class="badge-container position-absolute top-0 end-0 py-3 px-1">
                                <div class="badge-arrow bg_lightGreen">
                                    <i class="fas fa-crown"></i>
                                    DISCOUNTED PRICE
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 w-100 py-2" style="background-color: #0791BE4D;">
                                <div
                                    class="d-flex justify-content-center align-items-center gap-2 text-white fw-bold mb-0">
                                    <i class="far fa-clock"></i> 14 DAYS
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-md-3 mb-2">
                                <div class="d-flex text_darkGray font_montserrat gap-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p class="mb-0 small">Kaski Nepal</p>
                                </div>
                                <div class="d-flex align-items-center text_darkGray font_montserrat gap-2">
                                    <img src="./images/speedmeterhardImg.png" alt="Speed Meter Easy" width="32"
                                        height="32">
                                    <p class="mb-0 small">Hard</p>
                                </div>
                            </div>
                            <h5 class="popular_card_head mb-md-4 mb-3 text-start">Annapurna Base Camp Trek and Hiking
                            </h5>
                            <div class="d-flex align-items-center gap-1 mb-md-4 mb-3">
                                <span class="small text_darkGray">(25 reviews)</span>
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div
                                class="d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-3">
                                <div>
                                    <span class="fw-bold text_lightGrey">From </span>
                                    <span class="text_lightGreen fw-bolder">$140 </span>
                                    <span class="text_lightGrey text-decoration-line-through">$165</span>
                                </div>
                                <button class="btn btn_darkprimary rounded-0 px-3">VIEW DETAILS</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trip Card 3 -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card border-0 bg-white rounded overflow-hidden hover_effect rounded-0">
                        <div class="position-relative">
                            <img src="./images/popularImg2.jpg" alt="Annapurna Base Camp Trek and Hiking"
                                class="img-fluid w-100 rounded-0">
                            <div class="badge-container position-absolute top-0 end-0 py-3 px-1">
                                <div class="badge-arrow bg-danger">
                                    <i class="fas fa-crown"></i>
                                    GROUP JOINING
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 w-100 py-2" style="background-color: #0791BE4D;">
                                <div
                                    class="d-flex justify-content-center align-items-center gap-2 text-white fw-bold mb-0">
                                    <i class="far fa-clock"></i> 14 DAYS
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-md-3 mb-2">
                                <div class="d-flex text_darkGray font_montserrat gap-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p class="mb-0 small">Kaski Nepal</p>
                                </div>
                                <div class="d-flex align-items-center text_darkGray font_montserrat gap-2">
                                    <img src="./images/speedmetermediumImg.png" alt="Speed Meter Easy" width="32"
                                        height="32">
                                    <p class="mb-0 small">Medium</p>
                                </div>
                            </div>
                            <h5 class="popular_card_head mb-md-4 mb-3 text-start">Annapurna Base Camp Trek and Hiking
                            </h5>
                            <div class="d-flex align-items-center gap-1 mb-md-4 mb-3">
                                <span class="small text_darkGray">(25 reviews)</span>
                                ⭐⭐⭐⭐⭐
                            </div>
                            <div
                                class="d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-3">
                                <div>
                                    <span class="fw-bold text_lightGrey">From </span>
                                    <span class="text_lightGreen fw-bolder">$140 </span>
                                    <span class="text_lightGrey text-decoration-line-through">$165</span>
                                </div>
                                <button class="btn btn_darkprimary rounded-0 px-3">VIEW DETAILS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="text-center mt-4">
                <button class="btn btn_darkprimary destination-button">VIEW ALL PACKAGES</button>
            </div>
        </div>
    </section>

    <section class="position-relative"
        style="background-image: url('./images/travelcategoriesImg.jpg'); background-size: cover; background-position: center; min-height: 550px;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg_blackoverlay"></div>
        <div class="position-absolute top-0 start-0 w-100 h-100">
            <div class="container h-100">
                <div class="py-5 d-flex flex-column justify-content-between h-100">

                    <!-- Header -->
                    <div class="text-center">
                        <div class="travel-header mb-md-2">
                            <hr class="travel-line py-2">
                            <p class="travel-subtitle">POPULAR DESTINATION</p>
                        </div>
                        <h4 class="head_title text-white mb-3">TRAVEL CATEGORIES</h4>
                        <div class="d-flex justify-content-center align-items-center text-white">
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                            <i class="fas fa-suitcase fs-4 fw-bold"></i> <!-- TravelBag Icon -->
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                            <i class="fas fa-circle fs-4 fw-bold"></i>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="d-flex flex-wrap justify-content-md-between justify-content-center gap-2">
                        <div class="text-white fs-5 fw-bold text-center">Adventure</div>
                        <div class="text-white fs-5 fw-bold text-center">Trekking</div>
                        <div class="text-white fs-5 fw-bold text-center">Peak Climbing</div>
                        <div class="text-white fs-5 fw-bold text-center">Off Road</div>
                        <div class="text-white fs-5 fw-bold text-center">Exotic</div>
                        <div class="text-white fs-5 fw-bold text-center">Exploring</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bg_lightwhite py-5">
        <div class="container">
            <div class="d-flex justify-content-center text-center mb-md-5 pb-md-5 mb-4">
                <div class="">
                    <div class="section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2" />
                        <p class="section-subtitle">TRAVEL OFFERS & DISCOUNTS</p>
                    </div>
                    <h2 class='head_title mb-md-3'>SPECIAL TRAVEL OFFER</h2>
                    <p class='text_lightDark font_montserrat mb-0' style='max-width: 800px;'>Explore our curated list of
                        the best countries to visit in 2024 and discover incredible destinations waiting to be explored
                    </p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-5 pb-md-5">
                <div class="col mb-md-4">
                    <div class="card border-0 bg-white shadow rounded-3 hover_effect position-relative">
                        <img src="./images/specialtravelImg1.png" class="img-fluid w-100 rounded-top"
                            alt="Travel Image">
                        <div class="discount-badge">
                            <div
                                class="bg_darkOrange d-flex justify-content-center align-items-center flex-column font_mulish rounded-circle fs-6 fw-bold text-white">
                                <p class="my-0">20%</p>
                                <p class="fs-6 fw-semibold my-0">off</p>
                            </div>
                        </div>
                        <div class="card-details">
                            <p class="mb-2 fw-bolder text_darkprimary">NEPAL</p>
                            <p class="mb-2 fs-5 fw-bold">Experience the natural beauty of glacier</p>
                            <p class="text_lightprimary fw-bold font_montserrat mb-0">
                                Price: <span class="text-decoration-line-through">$1500</span>
                                <span class="text_lightGreen">$1200</span>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col mb-md-4">
                    <div class="card border-0 bg-white shadow rounded-3 hover_effect position-relative">
                        <img src="./images/specialtravelImg2.png" class="img-fluid w-100 rounded-top"
                            alt="Travel Image">
                        <div class="discount-badge">
                            <div
                                class="bg_darkOrange d-flex justify-content-center align-items-center flex-column font_mulish rounded-circle fs-6 fw-bold text-white">
                                <p class="my-0">20%</p>
                                <p class="fs-6 fw-semibold my-0">off</p>
                            </div>
                        </div>
                        <div class="card-details">
                            <p class="mb-2 fw-bolder text_darkprimary">NEPAL</p>
                            <p class="mb-2 fs-5 fw-bold">Experience the natural beauty of glacier</p>
                            <p class="text_lightprimary fw-bold font_montserrat mb-0">
                                Price: <span class="text-decoration-line-through">$1500</span>
                                <span class="text_lightGreen">$1200</span>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="col mb-md-4">
                    <div class="card border-0 bg-white shadow rounded-3 hover_effect position-relative">
                        <img src="./images/specialtravelImg3.png" class="img-fluid w-100 rounded-top"
                            alt="Travel Image">
                        <div class="discount-badge">
                            <div
                                class="bg_darkOrange d-flex justify-content-center align-items-center flex-column font_mulish rounded-circle fs-6 fw-bold text-white">
                                <p class="my-0">20%</p>
                                <p class="fs-6 fw-semibold my-0">off</p>
                            </div>
                        </div>
                        <div class="card-details">
                            <p class="mb-2 fw-bolder text_darkprimary">NEPAL</p>
                            <p class="mb-2 fs-5 fw-bold">Experience the natural beauty of glacier</p>
                            <p class="text_lightprimary fw-bold font_montserrat mb-0">
                                Price: <span class="text-decoration-line-through">$1500</span>
                                <span class="text_lightGreen">$1200</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn_darkprimary destination-button">VIEW ALL OFFERS</button>
            </div>
        </div>
    </section>


    <section>
        <div class="container pt-md-5 mt-md-5 mt-4">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <div class="section-header mb-md-1">
                        <hr class="section-line py-2" />
                        <p class="section-subtitle">ONGOING TRIPS</p>
                    </div>
                    <h2 class='head_title mb-md-3'>JOIN FIXED DEPARTURE TRIPS</h2>
                </div>
                <div class="col-md-3 text-end">
                    <div class="month_select">
                        <select class="form-select month_select py-md-3 py-2 px-md-4 px-3">
                            <option value="">SELECT MONTH, YEAR</option>
                            <option value="Jan-2025">Jan, 2025</option>
                            <option value="Feb-2025">Feb, 2025</option>
                            <option value="Mar-2025">Mar, 2025</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table trip_table">
                    <thead>
                        <tr>
                            <th>Trip Name</th>
                            <th>Departure Date</th>
                            <th>Status</th>
                            <th>Prices</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='trip_table_text fw-bold'>Everest Base Camp Trek</td>
                            <td>
                                <span class='trip_table_text fw-bolder'>16 Days</span><br /><span
                                    class='fs-6 text_lightDark'>From 9th - 24th Nov</span>
                            </td>
                            <td>
                                <p class="d-flex align-items-center gap-1 mb-0 fw-bold trip_table_text">
                                    <img src="./images/gurantedIcon.png" alt="guranted" width="24"
                                        height="24">Guaranteed
                                </p>
                                <span class='fs-6 font_montserrat'>8 Seat Left</span>
                                <div class="progress">
                                    <div class="progress-bar bg_lightprimary rounded-0" role="progressbar"
                                        style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fs-6 font_montserrat fw-bolder">$4500</span>
                                <span
                                    class="original-price ps-2 text-decoration-line-through text-danger small">$5000</span>
                                <div>
                                    <button class="btn btn_lightprimary_outline mt-2 rounded-0 px-md-4 py-md-2">JOIN
                                        US</button>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td class='trip_table_text fw-bold'>Everest Base Camp Trek</td>
                            <td>
                                <span class='trip_table_text fw-bolder'>16 Days</span><br /><span
                                    class='fs-6 text_lightDark'>From 9th - 24th Nov</span>
                            </td>
                            <td>
                                <p class="d-flex align-items-center gap-1 mb-0 fw-bold trip_table_text">
                                    <img src="./images/gurantedIcon.png" alt="guranted" width="24"
                                        height="24">Guaranteed
                                </p>
                                <span class='fs-6 font_montserrat'>8 Seat Left</span>
                                <div class="progress">
                                    <div class="progress-bar bg_lightprimary rounded-0" role="progressbar"
                                        style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="fs-6 font_montserrat fw-bolder">$4500</span>
                                <span
                                    class="original-price ps-2 text-decoration-line-through text-danger small">$5000</span>
                                <div>
                                    <button class="btn btn_lightprimary_outline mt-2 rounded-0 px-md-4 py-md-2">JOIN
                                        US</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- ultimate guide -->
    <section class="bg_lightwhite">
        <div class="container py-5">
            <div class="row my-md-5 align-items-center">
                <div class="col-lg-6 col-12 text-center mb-4 mb-lg-0">
                    <img src="images/epicadventuresImg.png" alt="Epic Adventures" class="img-fluid" />
                </div>
                <div class="col-lg-6 col-12 px-3 px-lg-5">
                    <p class="text_darkprimary mb-3 fw-bold text-center text-lg-start">INTRODUCTION ABOUT US</p>
                    <h4 class="head_title text-center text-lg-start">ULTIMATE GUIDE TO EPIC ADVENTURE</h4>
                    <div
                        class="d-flex flex-wrap justify-content-center justify-content-lg-start align-items-center text-danger mb-4">
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                        <span class="mx-2"><img src="./images/epicbagIcon.png" alt="price guaranted" width="15"
                                height="24"></span>
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                        <span class="fs-4 fw-bold text_darkOrange">&#8226;</span>
                    </div>
                    <p class="fs-6 mb-4 font_montserrat text_lightDark text-center text-lg-start">
                        Explore our curated list of the best countries to visit in 2024 and discover incredible
                        destinations waiting to be explored.
                    </p>
                    <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                        <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                            <img src="./images/priceguarantedIcon.png" alt="price guaranted" width="40" height="40">
                        </div>
                        <div>
                            <p class="fs-6 fw-bold font_montserrat mb-1">BEST PRICE GUARANTEED</p>
                            <p class="mb-0" style="max-width: 300px;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Ut elit tellus, luctus nec.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                        <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                            <img src="./images/mapIcon.png" alt="map" width="40" height="40">
                        </div>
                        <div>
                            <p class="fs-6 fw-bold font_montserrat mb-1">AMAZING DESTINATION</p>
                            <p class="mb-0" style="max-width: 300px;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Ut elit tellus, luctus nec.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-4 flex-column flex-sm-row text-center text-sm-start">
                        <div class="bg_darkprimary p-3 d-flex justify-content-center align-items-center">
                            <img src="./images/personIcon.png" alt="person" width="40" height="40">
                        </div>
                        <div>
                            <p class="fs-6 fw-bold font_montserrat mb-1">PERSONAL SERVICES</p>
                            <p class="mb-0" style="max-width: 300px;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Ut elit tellus, luctus nec.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 epic_img_containrer">
                <div class="splide" id="epic-img-slider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/pfnImg.png" alt="pfn logo" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/astaImg.png" alt="asta logo" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/sustainableImg.png" alt="sustainable logo" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/ntbImg.png" alt="ntb Img" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/earth.png" alt="earth" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/taan_img.png" alt="taan logo" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/adventurestravel_img.png" alt="adventures travel logo" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/yelp_img.png" alt="yelp logo" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                            <li class="splide__slide px-md-4" style="max-height: 85px">
                                <img src="images/epic_slider_img.png" alt="ntb Img" class="w-100 h-100"
                                    style="object-fit: contain;">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative" style="
        background-image: url('images/specialoffer_banner.png');
        background-size: cover;
        background-position: center;
        min-height: 550px;
    ">
        <!-- Dark overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background-color: #151515; opacity: 75%;">
        </div>

        <div class="position-absolute top-0 start-0 w-100 h-100 z-3">
            <div class="container h-100">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="text-center text-md-start">
                        <!-- Header section -->
                        <div class="d-flex column justify-content-start">
                            <div class="travel-header mb-md-2">
                                <hr class="travel-line py-2" />
                                <p class="travel-subtitle">HOLIDAY PACKAGE OFFER</p>
                            </div>
                        </div>

                        <!-- Title & description -->
                        <h4 class="head_title text-white mb-3">GET SPECIAL OFFERS</h4>
                        <p class="text-white fs-6 mb-4 fw-bold mx-auto mx-md-0" style="max-width: 580px;">
                            Sign up now to receive hot special offers and information about the
                            best tour packages, updates, and discounts!
                        </p>

                        <!-- Email input -->
                        <div class="email_input mb-4 mx-auto mx-md-0" style="max-width: 650px;">
                            <div class="input-group">
                                <input type="email"
                                    class="form-control bg-transparent border border-white text-white py-md-3 rounded-0"
                                    placeholder="Your Email Address..." aria-label="Recipient's email" />
                                <button class="btn btn_darkprimary rounded-0 px-md-3 fw-semibold email_signup_btn"
                                    type="button">
                                    SIGN UP NOW
                                </button>
                            </div>
                        </div>

                        <!-- Description -->
                        <p class="text_lightwhite mb-0 fw-medium font_montserrat mx-auto mx-md-0"
                            style="max-width: 700px;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                            tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class='bg_lightwhite py-5'>
        <div class="d-flex justify-content-center text-center mb-4">
            <div class="">
                <div class="section-header mb-md-1 d-flex justify-content-center">
                    <hr class="section-line py-2" />
                    <p class="section-subtitle">OUR TOUR GALLERY</p>
                </div>
                <h2 class='head_title mb-md-3'>Traveler's Photo Gallery</h2>
                <p class='text_lightDark font_montserrat mb-0' style="max-width: 800px;">
                    Explore our curated list of the best countries to visit in 2024 and discover incredible destinations
                    waiting to be explored
                </p>
            </div>
        </div>
        <div class="mx-md-5 mx-3">
            <div class="row align-items-center">
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div class="">
                        <img src="./images/travelphotogallerImg8.png" alt="travelphotogallerImg1" class='img-fluid' />
                    </div>
                </div>
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div class="mb-3 mb-md-4">
                        <img src="./images/travelphotogallerImg7.png" alt="travelphotogallerImg1" class='img-fluid' />
                    </div>
                    <div class="">
                        <img src="./images/travelphotogallerImg6.png" alt="travelphotogallerImg1" class='img-fluid' />
                    </div>
                </div>
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div class="mb-3 mb-md-4">
                        <div class="splide" id="traveler-slider">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        <img src="./images/travelphotogallerImg1.png" alt="travelphotogallerImg1" class='img-fluid' />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./images/travelphotogallerImg4.png" alt="travelphotogallerImg4" class='img-fluid' />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./images/travelphotogallerImg3.png" alt="travelphotogallerImg3" class='img-fluid' />
                                    </li>
                                    <li class="splide__slide">
                                        <img src="./images/travelphotogallerImg8.png" alt="travelphotogallerImg1" class='img-fluid' />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <img src="./images/travelphotogallerImg2.png" alt="travelphotogallerImg1" class='img-fluid' />
                    </div>
                </div>
                <div class="col-12 col-md mb-3 mb-md-0">
                    <div class="mb-3 mb-md-4">
                        <img src="./images/travelphotogallerImg3.png" alt="travelphotogallerImg1" class='img-fluid' />
                    </div>
                    <div class="">
                        <img src="./images/travelphotogallerImg4.png" alt="travelphotogallerImg1" class='img-fluid' />
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="">
                        <img src="./images/travelphotogallerImg5.png" alt="travelphotogallerImg1" class='img-fluid' />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- recent posts -->
    <section class="mb-5 py-md-5">
        <div class="container">
            <div class="d-flex justify-content-center text-center mb-md-5 mb-4">
                <div>
                    <div class="section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2">
                        <p class="section-subtitle">FROM OUR BLOG</p>
                    </div>
                    <h2 class='head_title mb-md-3'>OUR RECENT POSTS</h2>
                    <p class='text_lightDark font_montserrat mb-0' style="max-width: 800px;">
                        Explore our curated list of the best countries to visit in 2024 and discover incredible
                        destinations waiting to be explored
                    </p>
                </div>
            </div>

            <!-- Splide Slider -->
            <div class="recent_posts_slider position-relative mb-md-5 mb-4">
                <div class="splide" id="recentPostsSlider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide my-4">
                                <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2">
                                    <div class="recent_post_card_img">
                                        <img src="./images/recentpostsImg1.jpg" alt="recent posts" class="img-fluid">
                                    </div>
                                    <div class="card-body shadow-sm px-4 py-3">
                                        <p class='fs-5 fw-bold'>The best season to visit Everest basecamp</p>
                                        <p class='mb-0 text_darkGray small'>August 17, 2025</p>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide my-4">
                                <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2">
                                    <div class="recent_post_card_img">
                                        <img src="./images/recentpostsImg1.jpg" alt="recent posts" class="img-fluid">
                                    </div>
                                    <div class="card-body shadow-sm px-4 py-3">
                                        <p class='fs-5 fw-bold'>The best season to visit Everest basecamp</p>
                                        <p class='mb-0 text_darkGray small'>August 17, 2025</p>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide my-4">
                                <div class="card rounded-0 border-0 hover_effect recent_post_card mx-md-2">
                                    <div class="recent_post_card_img">
                                        <img src="./images/recentpostsImg3.jpg" alt="recent posts" class="img-fluid">
                                    </div>
                                    <div class="card-body shadow-sm px-4 py-3">
                                        <p class='fs-5 fw-bold'>The best season to visit Everest basecamp</p>
                                        <p class='mb-0 text_darkGray small'>August 17, 2025</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Custom Navigation Buttons -->
                <div class="splide_btn_section text-center mt-3">
                    <div class='splide_btn_prev splide_btn'>
                        <button id="custom-prev" class="splide_btn">
                            <img src="./images/pervArrow.png" alt="prev" width="24" height="20"
                                style="object-fit:contain;">
                        </button>
                    </div>
                    <div class='splide_btn_next splide_btn'>
                        <button id="custom-next" class="splide_btn">
                            <img src="./images/nextArrow.png" alt="next" width="24" height="20"
                                style="object-fit:contain;">
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn_darkprimary destination-button">VIEW ALL POSTS</button>
            </div>
        </div>
    </section>

    <!-- escape the city -->
    <section class="position-relative" style="
        background-image: url('./images/escapecity_banner.png');
        background-size: cover;
        background-position: center;
        min-height: 550px;
    ">
        <!-- Dark overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 z-1" style="background-color: #151515; opacity: 75%;">
        </div>

        <div class="position-absolute top-0 start-0 w-100 h-100 z-3">
            <div class="container h-100">
                <div class="d-flex flex-column justify-content-center h-100">
                    <div class="text-center text-md-start">
                        <!-- Header section -->
                        <div class="travel-header mb-md-2">
                            <hr class="travel-line py-2" />
                            <p class="travel-subtitle">EXPLORE WITH US</p>
                        </div>

                        <!-- Title & description -->
                        <h4 class="head_title text-white mb-3 text-center">ESCAPE THE CITY</h4>
                        <div class="d-flex justify-content-center mb-4">
                            <p class="text-center text-white fs-6" style="max-width: 750px;">
                                Explore our curated list of the best countries to visit in 2024 and discover incredible
                                destinations waiting to be explored.
                            </p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn_darkprimary destination-button">BOOK A TRIP</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- social media -->
    <section class="bg-white py-md-5">
        <div class="container py-md-5 py-4">
            <div class="d-flex justify-content-center text-center mb-md-5 mb-4">
                <div>
                    <div class="section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2">
                        <p class="section-subtitle">OUR SOCIAL MEDIA</p>
                    </div>
                    <h2 class="head_title mb-md-3">FOLLOW US ON INSTAGRAM</h2>
                    <p class="text_lightDark font_montserrat mb-0" style="max-width: 800px;">
                        Explore our curated list of the best countries to visit and discover incredible destinations
                        waiting to be explored
                    </p>
                </div>
            </div>

            <div class="row gap-md-3 gap-3">
                <!-- Instagram Post 1 -->
                <div class="col-12 col-md">
                    <div class="card instagram_card hover_effect">
                        <div class="d-flex justify-content-between p-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle border p-1">
                                    <img src="./images/logo.png" alt="logo" class="img-fluid" width="30" height="15">
                                </div>
                                <div>
                                    <p class="small fw-bold mb-0">nepalvisiontreks</p>
                                    <p class="mb-0 small fw-medium text-muted">250 followers</p>
                                </div>
                            </div>
                            <button class="btn btn_lightBlue fw-bold small px-md-2 py-md-1">View Profile</button>
                        </div>

                        <img src="./images/instagrampostImg1.png" alt="Instagram post" class="img-fluid w-100 mb-2">
                        <div class="card-body p-2">
                            <div class="instagram_card_border_bottom pb-2 mb-1">
                                <a href="#" class="text-decoration-none fw-bold">View more on Instagram</a>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center instagram_card_border_bottom pb-2 mb-1">
                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-suit-heart"></i></button>
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-chat"></i></button>
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-upload"></i></button>
                                    </div>
                                    <p class="mb-0 small fw-bold">10 likes</p>
                                </div>
                                <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                        class="bi bi-bookmark"></i></button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="text" class="form-control border-0 instagram_card_input"
                                    placeholder="Add a comment...">
                                <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                        class="bi bi-instagram"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="card instagram_card hover_effect">
                        <div class="d-flex justify-content-between p-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle border p-1">
                                    <img src="./images/logo.png" alt="logo" class="img-fluid" width="30" height="15">
                                </div>
                                <div>
                                    <p class="small fw-bold mb-0">nepalvisiontreks</p>
                                    <p class="mb-0 small fw-medium text-muted">250 followers</p>
                                </div>
                            </div>
                            <button class="btn btn_lightBlue fw-bold small px-md-2 py-md-1">View Profile</button>
                        </div>

                        <img src="./images/instagrampostImg2.png" alt="Instagram post" class="img-fluid w-100 mb-2">
                        <div class="card-body p-2">
                            <div class="instagram_card_border_bottom pb-2 mb-1">
                                <a href="#" class="text-decoration-none fw-bold">View more on Instagram</a>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center instagram_card_border_bottom pb-2 mb-1">
                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-suit-heart"></i></button>
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-chat"></i></button>
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-upload"></i></button>
                                    </div>
                                    <p class="mb-0 small fw-bold">10 likes</p>
                                </div>
                                <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                        class="bi bi-bookmark"></i></button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="text" class="form-control border-0 instagram_card_input"
                                    placeholder="Add a comment...">
                                <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                        class="bi bi-instagram"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="card instagram_card hover_effect">
                        <div class="d-flex justify-content-between p-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="rounded-circle border p-1">
                                    <img src="./images/logo.png" alt="logo" class="img-fluid" width="30" height="15">
                                </div>
                                <div>
                                    <p class="small fw-bold mb-0">nepalvisiontreks</p>
                                    <p class="mb-0 small fw-medium text-muted">250 followers</p>
                                </div>
                            </div>
                            <button class="btn btn_lightBlue fw-bold small px-md-2 py-md-1">View Profile</button>
                        </div>

                        <img src="./images/instagrampostImg3.png" alt="Instagram post" class="img-fluid w-100 mb-2">
                        <div class="card-body p-2">
                            <div class="instagram_card_border_bottom pb-2 mb-1">
                                <a href="#" class="text-decoration-none fw-bold">View more on Instagram</a>
                            </div>
                            <div
                                class="d-flex justify-content-between align-items-center instagram_card_border_bottom pb-2 mb-1">
                                <div>
                                    <div class="d-flex align-items-center gap-2">
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-suit-heart"></i></button>
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-chat"></i></button>
                                        <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                                class="bi bi-upload"></i></button>
                                    </div>
                                    <p class="mb-0 small fw-bold">10 likes</p>
                                </div>
                                <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                        class="bi bi-bookmark"></i></button>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <input type="text" class="form-control border-0 instagram_card_input"
                                    placeholder="Add a comment...">
                                <button class="btn instagram_card_btn fs-5 fw-bold p-1"><i
                                        class="bi bi-instagram"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Repeat the above block for more Instagram posts (change images & likes) -->
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS -->
    <section class="position-relative"
        style="background-image: url('./images/testimonials_banner.png'); background-size: cover; background-position: center; min-height: 550px;">
        <!-- White overlay -->
        <div class="bg_whiteoverlay"></div>

        <div class="testimonial-content">
            <div class="text-center mb-md-5 mt-md-4 pt-md-4 pt-3">
                <h3 class='head_title text-dark'>TESTIMONIALS</h3>
            </div>

            <div class="container" style="max-width: 910px;">
                <div class="testimonial_slider position-relative">
                    <div class="splide" id="testimonialSlider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide my-4">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class='font_montserrat fs-6 fst-italic mb-md-5 mb-3'>"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class='font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary'>
                                            Scott Marx</p>
                                        <p class='font_montserrat fs-6 fst-italic mb-0'>Canada</p>
                                    </div>
                                </li>
                                <li class="splide__slide my-4">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class='font_montserrat fs-6 fst-italic mb-md-5 mb-3'>"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class='font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary'>
                                            Scott Marx</p>
                                        <p class='font_montserrat fs-6 fst-italic mb-0'>Canada</p>
                                    </div>
                                </li>
                                <li class="splide__slide my-4">
                                    <div class="text-center mb-md-5 mb-3">
                                        <p class='font_montserrat fs-6 fst-italic mb-md-5 mb-3'>"Dolorum aenean
                                            dolorem minima! Voluptatum? Corporis condimentum ac
                                            primis fusce, atque! Vivamus. Non cupiditate natus excepturi, quod
                                            quo, aute facere? Deserunt aliquip, egestas ipsum, eu. Dolorum
                                            aenean dolorem minima!? Corporis condi mentum acpri!"</p>

                                        <p class='font_montserrat fs-5 fst-italic mb-1 fw-bold text_darkprimary'>
                                            Scott Marx</p>
                                        <p class='font_montserrat fs-6 fst-italic mb-0'>Canada</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-2 gap-2">
                    <div>
                        <img src="./images/starImg.png" alt="star" class='img-fluid' width="34" height="34">
                    </div>
                    <div>
                        <img src="./images/tripadvisorsymboImg.png" alt="tripadvisor" class='img-fluid' width="34"
                            height="34">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="my-5 py-md-5">
        <div class="container">
            <div class="d-flex justify-content-center text-center mb-md-5 mb-4">
                <div>
                    <div class="section-header mb-md-1 d-flex justify-content-center">
                        <hr class="section-line py-2">
                        <p class="section-subtitle">THINGS TO KNOW</p>
                    </div>
                    <h2 class="head_title mb-md-3">FAQs</h2>
                    <p class="text_lightDark font_montserrat mb-0" style="max-width: 800px;">
                        Explore our curated list of the best countries to visit in 2024 and discover incredible
                        destinations waiting to be explored.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 faqs_accordion">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button accordion_button_title py-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    What should I pack for a trek?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="accordion_body_content text_lightDark font_montserrat mb-0">
                                        Pack comfortable clothing, sturdy hiking boots, a waterproof jacket, a first-aid
                                        kit, snacks, and a reusable water bottle.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button accordion_button_title py-4 collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    What is the best time for trekking?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="accordion_body_content text_lightDark font_montserrat mb-0">
                                        Pack comfortable clothing, sturdy hiking boots, a waterproof jacket, a first-aid
                                        kit, snacks, and a reusable water bottle.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button accordion_button_title py-4 collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Can beginners go for trekking?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="accordion_body_content text_lightDark font_montserrat mb-0">
                                        Pack comfortable clothing, sturdy hiking boots, a waterproof jacket, a first-aid
                                        kit, snacks, and a reusable water bottle.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button accordion_button_title py-4 collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    What is the best time for trekking?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="accordion_body_content text_lightDark font_montserrat mb-0">
                                        Pack comfortable clothing, sturdy hiking boots, a waterproof jacket, a first-aid
                                        kit, snacks, and a reusable water bottle.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button accordion_button_title py-4 collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    Can beginners go for trekking?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="accordion_body_content text_lightDark font_montserrat mb-0">
                                        Pack comfortable clothing, sturdy hiking boots, a waterproof jacket, a first-aid
                                        kit, snacks, and a reusable water bottle.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="./images/faqs_banner.png" alt="faq" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative contact_info_section" style="background-image: url('./images/contactus_banner.png');background-size: cover;background-position: center;min-height: 100vh;">

        <!-- Dark overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
            style='background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 24%, rgba(0,0,0,0.9019257361147583) 83%)'>
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100  z-3">
            <div class="container py-md-5 py-4">
                <!-- Section Title -->
                <div class="text-center text-white head_title pt-md-5 mb-4">
                    Contact Us
                </div>

                <!-- Contact Cards -->
                <div class="p-md-3 p-2 mb-md-5 mb-4" style="background-color: #4690BF33;">
                    <div class="row g-4 contact_info_container">
                        <!-- Location 1 -->
                        <div class="col-12 col-md-4 px-md-4 contact_info_card contact_info_card_broder">
                            <div class="text-center text-md-start">
                                <img src="./images/thamel_location.png" alt="location" class="mb-md-3 mb-1" width="50"
                                    height="50">
                                <div>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Keshar Mahal, Thamel
                                    </p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Phone: 977-1-4524762
                                    </p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Fax: 977-1-4523296
                                    </p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                        info@nepalvisiontreks.com
                                    </p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                        sales@nepalvisiontreks.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Location 2 -->
                        <div class="col-12 col-md-4 px-md-4 contact_info_card contact_info_card_broder">
                            <div class="text-center text-md-start">
                                <img src="./images/usa_location.png" alt="location" class="mb-md-3 mb-1" width="50"
                                    height="50">
                                <div>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Washington, DC, USA
                                    </p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Phone: +1
                                        202-368-6657
                                    </p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Parashu Nepal
                                        (Marketing
                                        Director)</p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                        parashu@nepalvisiontreks.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Location 3 -->
                        <div class="col-12 col-md-4 px-md-4 contact_info_card">
                            <div class="text-center text-md-start">
                                <img src="./images/australia_location.png" alt="location" class="mb-md-3 mb-1"
                                    width="50" height="50">
                                <div>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Sydney, Australia</p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Whatsapp: +61 426 730
                                        548
                                    </p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">Ashim Wagle
                                        (Marketing
                                        Director)</p>
                                    <p class="text-white font_montserrat fw-semibold mb-md-2 mb-1">
                                        ashim@nepalvisiontreks.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact_imgs">
                    <div class="splide" id="image-slider">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                    <img src="./images/tripadvisorsymboImg.png" alt="tripadvisor" class="img-fluid"
                                        width="34" height="34">
                                </li>
                                <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                    <img src="./images/newyorktimesImg.png" alt="newyorktimes" class="img-fluid"
                                        width="240" height="34">
                                </li>
                                <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                    <img src="./images/expedia_logoImg.png" alt="expedia" class="img-fluid" width="95"
                                        height="34">
                                </li>
                                <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                    <img src="./images/condnasttraveler_logoImg.png" alt="condé nast" class="img-fluid"
                                        width="81" height="34">
                                </li>
                                <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                    <img src="./images/lonelyplanetlogoImg.png" alt="lonely planet" class="img-fluid"
                                        width="69" height="34">
                                </li>
                                <li class="splide__slide d-flex align-items-center px-1 px-md-4 ">
                                    <img src="./images/forbestravelguide_logoImg.png" alt="forbes travel"
                                        class="img-fluid" width="120" height="34">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer bg-dark text-white">
        <div class="bg-black py-md-5 py-5">
            <div class="container py-md-5 my-md-4">
                <div class="row">
                    <!-- About Nepal Vision -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">ABOUT NEPAL VISION</h5>
                        </div>
                        <p class="py-md-3 py-2 mb-0 text_lightgray font_montserrat">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                            ullamcorper mattis, pulvinar dapibus leo.
                        </p>
                        <div class="d-flex flex-wrap justify-content-between py-md-3 py-2 gap-3">
                            <img src="./images/tripadvisorimg.png" alt="Tripadvisor" class="img-fluid" width="95">
                            <img src="./images/thenewyorktimesimg.png" alt="The New York Times" class="img-fluid"
                                width="160">
                        </div>
                        <p class="py-md-3 py-2">
                            <a href="/about-us"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">About Us</a>
                            <a href="/blogs"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">Blogs</a>
                            <a href="/information"
                                class="text-decoration-none font_mulish px-2 footer-link">Information</a>
                        </p>
                        <p>
                            <a href="/privacy-policy"
                                class="text-decoration-none font_mulish px-2 footer_border_end footer-link">Privacy
                                Policy</a>
                            <a href="/terms-conditions" class="text-decoration-none font_mulish px-2 footer-link">Terms
                                & Conditions</a>
                        </p>
                    </div>

                    <!-- Contact Us -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">CONTACT US</h5>
                        </div>
                        <p class="py-md-3 py-2 text_lightgray font_montserrat">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="./images/phoneIcon.png" alt="location"
                                    width="14" height="14"></span>977-1-4524762</p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="./images/messageIcon.png"
                                    alt="location" width="16" height="16"></span>info@nepalvisiontreks.com</p>
                        <p class="contact_info mb-2"><span class="pe-2"><img src="./images/locationIcon.png"
                                    alt="location" width="16" height="16"></span>Keshar Mahal, Thamel, Nepal</p>
                    </div>

                    <!-- Recent Posts -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">RECENT POSTS</h5>
                        </div>
                        <p class="fs-6 fw-semibold font_montserrat border-bottom border-dark-subtle pb-3">
                            Best season to visit Everest basecamp<br>
                            <small class="fw-light text_lightgray font_montserrat">August 17, 2025 | No Comments</small>
                        </p>
                        <p class="fs-6 fw-semibold font_montserrat border-bottom border-dark-subtle pb-3">
                            Best season to visit Everest basecamp<br>
                            <small class="fw-light text_lightgray font_montserrat">August 17, 2025 | No Comments</small>
                        </p>
                    </div>

                    <!-- Subscribe Us -->
                    <div class="col-md-3">
                        <div class="d-flex justify-content-md-start justify-content-center">
                            <h5 class="footer_border_start ps-2">SUBSCRIBE US</h5>
                        </div>
                        <p class="py-md-3 py-2 mb-0 text_lightgray font_montserrat">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </p>
                        <form>
                            <input type="email" class="form-control mb-4 rounded-0 py-md-3 py-2"
                                placeholder="Your Email..." required>
                            <button type="submit"
                                class="btn btn_darkprimary w-100 py-md-3 py-2 rounded-0 fw-semibold">SUBSCRIBE
                                NOW</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="text-center py-md-3 py-2" style="background-color: #0D0C0C;">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-md-between justify-content-center align-items-center">
                    <div>
                        <a class="navbar-brand" href="/">
                            <img src="./images/logo_white.png" alt="Nepal Vision" style="width: 180px; height: 61px;">
                        </a>
                    </div>
                    <div>
                        <p class="mb-0">Copyright © 2025 Nepal Vision Treks.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Splide.js JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#traveler-slider', {
                type: 'loop',
                perPage: 1,
                autoplay: true,
                interval: 2000, // Adjust auto-scroll speed (ms)
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                pagination: false,
            }).mount();
        });

        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#image-slider', {
                type: 'loop',
                perPage: 5,
                autoplay: true,
                interval: 2000, // Adjust auto-scroll speed (ms)
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                pagination: false,
            }).mount();
        });

        document.addEventListener('DOMContentLoaded', function () {
            new Splide('#epic-img-slider', {
                type: 'loop',
                perPage: 5,
                autoplay: true,
                interval: 2000, // Adjust auto-scroll speed (ms)
                pauseOnHover: false,
                pauseOnFocus: false,
                arrows: false,
                pagination: false,
            }).mount();
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var splide = new Splide("#recentPostsSlider", {
                type: "loop",
                perPage: 3,
                perMove: 1,
                gap: "1rem",
                pagination: false,
                arrows: false,
                autoWidth: false,
                focus: "center",
                breakpoints: {
                    1200: { perPage: 3, gap: "1rem" },
                    992: { perPage: 2, gap: "1.5rem" },
                    768: { perPage: 1 },
                },
            }).mount();

            // Custom button navigation
            document.getElementById("custom-prev").addEventListener("click", function () {
                splide.go("-1");
            });

            document.getElementById("custom-next").addEventListener("click", function () {
                splide.go("+1");
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            var splide = new Splide("#testimonialSlider", {
                type: "loop",
                perPage: 1,
                perMove: 1,
                gap: "1rem",
                pagination: true,
                arrows: false,
                autoWidth: false,
                focus: "center",
            }).mount();
        });
    </script>

</body>

</html>
