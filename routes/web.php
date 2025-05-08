<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;

// Index page
Route::get('/', [HomeController::class, 'home'])->name('/');

Route::get('contact', [ContactController::class, 'index'])->name('contactus');
Route::post('contact', [ContactController::class, 'store'])->name('contactus.store');

Route::get('destination/{url}', [DestinationController::class, 'index'])->name('destination');
Route::get('search', [DestinationController::class, 'index'])->name('search');
Route::get('package-destination/{url}', [DestinationController::class, 'index'])->name('package.destination');
Route::get('filter-package', [DestinationController::class, 'filter']);
Route::get('package-category/{url}', [DestinationController::class, 'index'])->name('package.category');
Route::get('package-place/{url}', [DestinationController::class, 'index'])->name('package.place');
Route::get('deals', [DestinationController::class, 'index'])->name('deals');

Route::get('{country?}/package-detail/{url?}', [PackageController::class, 'show'])->name('package.detail');
Route::get('package-detail/{url?}', [PackageController::class, 'show'])->name('package.detail');
Route::get('package/print/{package}', [PackageController::class, 'printpackage'])->name('print');
Route::get('departure-date', [PackageController::class, 'Departure'])->name('departure');

Route::get('book-now', [BookingController::class, 'index'])->name('booknow');
Route::post('book-now', [BookingController::class, 'store'])->name('booknow.store');
Route::any('payment-success', [BookingController::class, 'success'])->name('booknow.success');

Route::any('payment-failed', function () {
    return view('frontend.failed');
})->name('failed');



Route::get('blogs', [BlogController::class, 'index'])->name('blog');
Route::get('blog-detail/{url}', [BlogController::class, 'show'])->name('blog.detail');

Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('event-detail/{id}', [EventController::class, 'show'])->name('event.detail');

Route::post('enquery-post', [ContactController::class, 'Enquery'])->name('enquery.post');
Route::get('about-us', [HomeController::class, 'about'])->name('about');
Route::get('useful-info', [HomeController::class, 'UsefulInfo'])->name('usefulinfo');
Route::get('privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('term-condition', [HomeController::class, 'term'])->name('term');
Route::get('gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('our-team', [HomeController::class, 'team'])->name('team');

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
