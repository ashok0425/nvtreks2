<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;

// Index page
Route::get('/', [HomeController::class, 'home'])->name('/');
Route::get('cms/{page?}', [HomeController::class, 'Page'])->name('cms.page');
Route::get('cms-page/{page}/{id?}', [HomeController::class, 'PageDetail'])->name('cms.detail');

Route::get('contact', [ContactController::class, 'index'])->name('contactus');
Route::post('contact', [ContactController::class, 'store'])->name('contactus');

Route::get('destination/{url}', [DestinationController::class, 'index'])->name('destination');
Route::get('package-destination/{url}', [DestinationController::class, 'index'])->name('package.destination');
Route::get('filter-package', [DestinationController::class, 'filter']);
Route::get('package-category/{url}', [DestinationController::class, 'index'])->name('package.category');
Route::get('package-place/{url}', [DestinationController::class, 'index'])->name('package.place');
Route::get('deals', [DestinationController::class, 'index'])->name('deals');

Route::get('{country?}/package-detail/{url?}', [PackageController::class, 'show'])->name('package.detail');
Route::get('package-detail/{url?}', [PackageController::class, 'show'])->name('package.detail');

Route::get('book-now/{url?}/{date?}', [BuyController::class, 'index'])->name('booknow');
Route::post('booking/step2', [BuyController::class, 'step2'])->name('booking.step2');
Route::post('booking/store', [BuyController::class, 'store'])->name('booking.step2.store');
Route::get('booking-online/{id?}', [BuyController::class, 'payonline'])->name('booking.online');
Route::post('payment-confirmation', [BuyController::class, 'Confirmation'])->name('booking.confirmation');
Route::any('payment', [BuyController::class, 'getPayment'])->name('payment-from-bank');
Route::any('payment-success', [BuyController::class, 'getPayment'])->name('payment-from-bank-reponse');
Route::any('pay-thankyou', [BuyController::class, 'thanku'])->name('pay.thanku');

Route::any('payment-failed', function () {
    return view('frontend.failed');
})->name('failed');

Route::get('package/print/{package}', [PackageController::class, 'printpackage'])->name('print');


Route::get('blogs', [BlogController::class, 'index'])->name('blog');
Route::get('blog-detail/{url}', [BlogController::class, 'show'])->name('blog.detail');
Route::post('filterBlog', [BlogController::class, 'filterBlog'])->name('filterBlog');

Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('useful-info', [EventController::class, 'UsefulInfo'])->name('usefulinfo');
Route::get('event-detail/{id}', [EventController::class, 'show'])->name('event.detail');

Route::post('enquery-post', [ContactController::class, 'Enquery'])->name('enquery.post');
Route::get('departure-date', [PackageController::class, 'Departure'])->name('departure');

Route::get('testimonials/{package?}', [PackageController::class, 'Testimonial'])->name('testimonials');
Route::post('testimonials/store', [PackageController::class, 'testimonialStore'])->name('testimonials.store');

Route::post('subscribe/store', [ContactController::class, 'subscribeStore'])->name('subscribe.store');

// Optional static routes
Route::get('itinerary/{id?}/{d?}', function () {
    return redirect('https://nepalvisiontreks.com/package-category/trekking');
});

Route::get('load-quick-trip', function () {
    return view('frontend.template.quick_trip');
});

Route::get('blog/{assa}', function () {
    return redirect()->route('blog');
});
