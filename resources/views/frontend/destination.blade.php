@extends('frontend.layout.master')

@section('content')
<section class="video_section mb-md-5 mb-4">
    <!-- navbar -->
    @include('frontend.layout.header')

    <div class="position-absolute top-0 start-0 w-100 h-100">
        <div class="banner-container"
            style="background-image: url({{getImageUrl($destination->cover_image)}});background-size: cover;background-position: center;">
            <div class="position-absolute top-0 start-0 w-100 h-100 z-1"
                style='background-color: #000000;opacity: 20%'></div>
            <div class="banner-content">
                <h1 class="banner-title">{{$destination->name}}</h1>
            </div>
        </div>
    </div>

</section>

<section class='mb-5' id="app">
    <div class="container py-md-5 py-4">
        <div class="row">
            <div  class="col-md-4">
                <div class="pe-md-5 listing_Card position-sticky" style="top: 20px;">
                  <h4 class="fw-bolder fs-5 text-decoration-underline mb-4" @click="clearAll">Clear All Filters</h4>

                  <!-- Search -->
                  <div class="mb-md-5 mb-3 pb-md-5 pb-3 border-bottom border-dark-subtle">
                    <div class="input-group search_input">
                      <span class="input-group-text bg-transparent ps-3 pe-0 rounded-0 py-3">
                        <i class="bi bi-search fs-4"></i>
                      </span>
                      <input v-model="filters.search" type="text" class="form-control border border-start-0 ps-2 py-3 rounded-0"
                             placeholder="Find your trip.." />
                    </div>
                  </div>

                  <!-- Price Range -->
                  <div class="mb-md-5 mb-3 pb-md-5 pb-3 border-bottom border-dark-subtle">
                    <div class="d-flex justify-content-between mb-2">
                      <label class="text_lightGrey fs-6 fw-bold">Price Range USD</label>
                      <button @click="filters.price.min = 0; filters.price.max = 4000"
                              class="border-0 bg-white p-0 text_darkOrange font_montserrat small">Reset</button>
                    </div>
                    <div class="mt-3">
                      <div class="d-flex justify-content-between mb-1 text_lightGrey font_montserrat small">
                        <span>@{{ filters.price.min }}</span>
                        <span>@{{ filters.price.max }}</span>
                      </div>
                      <div class="slider-container">
                        <input v-model="filters.price.min" type="range" min="0" max="4000" step="50" class="slider">
                        <input v-model="filters.price.max" type="range" min="0" max="4000" step="50" class="slider">
                      </div>
                    </div>
                  </div>

                  <!-- Days -->
                  <div class="mb-md-5 mb-3 pb-md-5 pb-3 border-bottom border-dark-subtle">
                    <div class="d-flex justify-content-between mb-2">
                      <label class="text_lightGrey fs-6 fw-bold">Days</label>
                      <button @click="filters.days.min = 1; filters.days.max = 30"
                              class="border-0 bg-white p-0 text_darkOrange font_montserrat small">Reset</button>
                    </div>
                    <div class="mt-3">
                      <div class="d-flex justify-content-between mb-1 text_lightGrey font_montserrat small">
                        <span>@{{ filters.days.min }}</span>
                        <span>@{{ filters.days.max }}</span>
                      </div>
                      <div class="slider-container">
                        <input v-model="filters.days.min" type="range" min="1" max="30" step="1" class="slider">
                        <input v-model="filters.days.max" type="range" min="1" max="30" step="1" class="slider">
                      </div>
                    </div>
                  </div>

                  <!-- Difficulty -->
                  <div class="mb-md-5 mb-3 pb-md-5 pb-3 border-bottom border-dark-subtle">
                    <div class="d-flex justify-content-between mb-2">
                      <label class="text_lightGrey fs-6 fw-bold">Difficulty</label>
                      <button @click="filters.difficulty = ''"
                              class="border-0 bg-white p-0 text_darkOrange font_montserrat small">Reset</button>
                    </div>
                    <div class="form-check">
                      <input v-model="filters.difficulty" type="radio" class="form-check-input" name="difficulty" value="hard">
                      <label class="form-check-label text-black small font_montserrat">Hard</label>
                    </div>
                    <div class="form-check">
                      <input v-model="filters.difficulty" type="radio" class="form-check-input" name="difficulty" value="medium">
                      <label class="form-check-label text-black small font_montserrat">Medium</label>
                    </div>
                    <div class="form-check">
                      <input v-model="filters.difficulty" type="radio" class="form-check-input" name="difficulty" value="easy">
                      <label class="form-check-label text-black small font_montserrat">Easy</label>
                    </div>
                  </div>

                  <!-- Category -->
                  <div class="mb-md-5 mb-3 pb-md-5 pb-3 border-bottom border-dark-subtle">
                    <div class="d-flex justify-content-between mb-2">
                      <label class="text_lightGrey fs-6 fw-bold">Select Category</label>
                      <button @click="filters.category = ''"
                              class="border-0 bg-white p-0 text_darkOrange font_montserrat small">Reset</button>
                    </div>
                    @foreach ($categories as $category)
                    <div class="form-check">
                      <input v-model="filters.category" type="radio" class="form-check-input" name="category"  value="{{$category->id}}">
                      <label class="form-check-label text-black small font_montserrat">{{$category->name}}</label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
    <div class="col-md-8 px-md-4">
        <div class="mb-md-5 mb-4">
            <div class="section-header mb-md-1">
                <hr class="section-line py-2" style="border-color: #C29500;" />
                <p class="section-subtitle text_darkOrange">Explore Destinations</p>
            </div>
            <h2 class='head_title mb-md-3'>NEPAL</h2>
            <p class='font_montserrat fs-6 text_lightDark' style='max-width: 500px;'>
                Explore our curated list of the best countries to visit in 2024 and discover incredible
                destinations waiting to be explored
            </p>
        </div>
            <div id="package-list" class="row gap-4 gap-md-0">
                <div v-for="package in packages" :key="package.id" class="col-12 col-md-6 px-md-4 mb-md-5">
                    <div class="card border-0 bg-white rounded overflow-hidden hover_effect rounded-0">
                        <div class="position-relative">
                            <img :src="package.thumbnail || './images/listImg1.jpg'" :alt="package.name"
                                class="img-fluid w-100 rounded-0" style="height: 200px"/>

                                <div v-if="package.is_luxury" class="badge-container position-absolute top-0 end-0 py-3 px-1">
                                    <div class="badge-arrow bg_darkOrange">
                                        <div class="d-flex align-items-center gap-1 badge-arrow-content">
                                            <img src="{{asset('frontend/images/crownIcon.svg')}}" alt="crown">
                                            LUXURY
                                        </div>
                                    </div>
                                </div>

                                <div v-else-if="package.is_group" class="badge-container position-absolute top-0 end-0 py-3 px-1">
                                    <div class="badge-arrow bg-danger">
                                        <div class="d-flex align-items-center gap-1 badge-arrow-content">
                                            <img src="{{asset('frontend/images/proplegroupIcon.svg')}}" alt="group" loadin='lazy'>
                                            GROUP JOINING
                                        </div>
                                    </div>
                                </div>

                                <div v-else-if="package.discounted_price" class="badge-container position-absolute top-0 end-0 py-3 px-1">
                                    <div class="badge-arrow bg_lightGreen">
                                        <div class="d-flex align-items-center gap-1 badge-arrow-content">
                                            <img src="{{asset('frontend/images/discountedIcon.svg')}}" alt="discounted" loading='lazy'>
                                            DISCOUNTED PRICE
                                        </div>
                                    </div>
                                </div>


                            <div class="position-absolute bottom-0 w-100 py-2" style="background-color: #0791BE4D;">
                                <div class="d-flex justify-content-center align-items-center gap-2 text-white fw-bold mb-0">
                                    <i></i>
                                    @{{ package.duration }} DAYS
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-md-3 mb-2">
                                <div class="d-flex align-items-center text_darkGray font_montserrat gap-1">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <p class='mb-0 small'>@{{ package.departure_from || 'Nepal' }}</p>
                                </div>
                                <div class="d-flex align-items-center text_darkGray font_montserrat gap-2">
                                    <img src="{{asset('frontend/images/speedmetereasyImg.png')}}" alt="Speed Meter Easy" width="32" height="32" loading='lazy'/>
                                    <p class='mb-0 small'>@{{ package.difficulty }}</p>
                                </div>
                            </div>

                            <h5 class="popular_card_head mb-md-4 mb-3 text-start">@{{ package.name }}</h5>

                            <div class="d-flex align-items-center gap-1 mb-md-4 mb-3">
                                <span class='small text_darkGray'>(@{{ package.rating ?? 0 }} reviews)</span>
                                <div class="text-warning">
                                    <i v-for="i in 5" :class="['bi', i <= Math.floor(package.rating) ? 'bi-star-fill' : i - 0.5 === package.rating ? 'bi-star-half' : 'bi-star']"></i>
                                </div>
                            </div>

                            <div class="d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-3">
                                <div>
                                    <span class='fw-bold text_lightGrey'>From </span>
                                    <span class='text_lightGreen fw-bolder'>$@{{ package.discounted_price ?? package.price }}</span>
                                    <span v-if="package.discounted_price" class='text_lightGrey text-decoration-line-through'>
                                        $@{{ package.price }}
                                    </span>
                                </div>
                                <a :href="" class='btn btn_darkprimary rounded-0 px-3'>VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <!-- Previous Button -->
                    <li class="page-item" :class="{'disabled': currentPage === 1}">
                        <button class="page-link" @click="changePage(currentPage - 1)">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                    </li>

                    <!-- First Page Link -->
                    <li v-if="currentPage > 3" class="page-item">
                        <button class="page-link" @click="changePage(1)">1</button>
                    </li>

                    <!-- "..." to indicate skipped pages -->
                    <li v-if="currentPage > 4" class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>

                    <!-- Page Number Range -->
                    <li v-for="page in pageRange" :key="page" class="page-item" :class="{'active': currentPage === page}">
                        <button class="page-link" @click="changePage(page)">@{{ page }}</button>
                    </li>

                    <!-- "..." to indicate skipped pages -->
                    <li v-if="currentPage < totalPages - 3" class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>

                    <!-- Last Page Link -->
                    <li v-if="currentPage < totalPages - 3" class="page-item">
                        <button class="page-link" @click="changePage(totalPages)">@{{ totalPages }}</button>
                    </li>

                    <!-- Next Button -->
                    <li class="page-item" :class="{'disabled': currentPage === totalPages}">
                        <button class="page-link" @click="changePage(currentPage + 1)">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </li>
                </ul>
            </nav>


        </div>
    </div>
    </div>
    </div>
</section>
@endsection
@push('style')
    <style>
         .slider-container {
            width: 100%;
            position: relative;
            height: 30px;
        }

        .slider {
            position: absolute;
            width: 100%;
            -webkit-appearance: none;
            appearance: none;
            height: 6px;
            background: #C29500;
            border-radius: 5px;
            outline: none;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            height: 18px;
            width: 18px;
            background-color: white;
            border-radius: 50%;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            border: 2px solid white;
            cursor: pointer;
            position: relative;
            z-index: 2;
        }
    </style>
@endpush

@push('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue@3.3.4/dist/vue.global.prod.js"></script>
<script>
    const { createApp, watch } = Vue;

    createApp({
      delimiters: ['@{{', '}}'],
      data() {
        return {
          packages: [],
          currentPage: 1,
          totalPages: 1, // You will update this based on the response
          filters: {
            search: '',
            price: { min: 0, max: 8000 },
            days: { min: 1, max: 30 },
            difficulty: '',
            category: '',
            destination_id: "{{$destination->id}}"
          }
        };
      },
      computed: {
    // Generate the range of pages to display
    pageRange() {
      const range = [];
      const start = Math.max(1, this.currentPage - 2); // 2 pages before the current page
      const end = Math.min(this.totalPages, this.currentPage + 2); // 2 pages after the current page

      for (let i = start; i <= end; i++) {
        range.push(i);
      }

      return range;
    }
  },
      watch: {
        filters: {
          deep: true,
          handler() {
            this.fetchPackages();
          }
        }
      },
      mounted() {
        this.fetchPackages();
      },
      methods: {
        fetchPackages() {
          // Preparing filters to be sent in the query string
          const params = {
            ...this.filters,
            page: this.currentPage
          };

          // Sending filters to the backend
          axios.get('/filter-package', { params })
            .then(response => {
                this.packages = response.data.data || [];
                this.totalPages = response.data.meta.totalPages || 1; // Assuming the backend returns total pages
            })
            .catch(error => {
              console.error('Error fetching packages:', error);
            });
        },
        changePage(page) {
          if (page > 0 && page <= this.totalPages) {
            this.currentPage = page;
            this.fetchPackages();
          }
        },
        clearAll() {
          this.filters = {
            search: '',
            price: { min: 0, max: 4000 },
            days: { min: 1, max: 30 },
            difficulty: '',
            category: '',
            destination_id: "{{$destination->id}}"
          };
          this.fetchPackages(); // Re-fetch with cleared filters
        }
      }
    }).mount('#app');
</script>


@endpush
