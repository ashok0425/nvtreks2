const header = document.getElementById('header');
window.addEventListener('scroll', () => {
    if (window.scrollY > 500) {
        header.classList.add('nav-active')
    }
    else {
        header.classList.remove('nav-active')
    }
})





$(document).ready(function () {

    $(function () {
        $('.lazy').Lazy();
    });


    $('.quick_trips_carousel').owlCarousel({
        autoplay: false,
        autoplayTimeout: 2000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 5
            }
        }
    });


    $('.destinations').owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });


    $('.allpackages').owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });


    $('.special_packages').owlCarousel({
        autoplay: true,
        autoplayTimeout: 6000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    $('.testimonials').owlCarousel({
        autoplay: true,
        autoplayTimeout: 3000,
        loop: true,
        dots: false,
        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });


    $('.afflicated').owlCarousel({
        autoplay: true,
        autoplayTimeout: 3000,
        loop: true,
        dots: false,
        nav: false,

        // navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        margin: 0,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });


    $('#search_icon').click(function () {
        $('.search_box').toggleClass('d-none')
    })

})


// $(document).ready(function () {
//     $(".owl-carousel").owlCarousel({
//         items: 1,
//         loop: true,
//         nav: true,
//     });
// });