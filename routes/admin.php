<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('login', [App\Http\Controllers\BackEnd\AuthController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\BackEnd\AuthController::class, 'store'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\BackEnd\AuthController::class, 'show'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\BackEnd\AuthController::class, 'profile'])->name('profile');
Route::post('profile/update-profile', [App\Http\Controllers\BackEnd\AuthController::class, 'update'])->name('profile.update');
Route::post('profile/change-password', [App\Http\Controllers\BackEnd\AuthController::class, 'changePassword'])->name('password');
Route::get('profile/change-password', [App\Http\Controllers\BackEnd\AuthController::class, 'getpassword'])->name('password');
Route::post('profile/logout', [App\Http\Controllers\BackEnd\AuthController::class, 'destroy'])->name('logout');
Route::get('profile/logout/admin', [App\Http\Controllers\BackEnd\AuthController::class, 'destroy'])->name('logout');

// Destination
Route::resource('/destinations', App\Http\Controllers\BackEnd\Travel\DestinationsController::class);
Route::get('/destinations/delete/{id}', [App\Http\Controllers\BackEnd\Travel\DestinationsController::class, 'destroy'])->name('destination.delete');

// Destination category
Route::resource('/categories-destinations', App\Http\Controllers\BackEnd\Travel\CategoriesDestinationsController::class);

// Category Region
Route::resource('/categories-places', App\Http\Controllers\BackEnd\Travel\CategoriesPlacesController::class);

// Packages
Route::resource('/packages', App\Http\Controllers\BackEnd\Travel\PackagesController::class);
Route::get('/country-packages', [App\Http\Controllers\BackEnd\Travel\PackagesController::class, 'countryPackage'])->name('package.country');
Route::get('/country-packages/create', [App\Http\Controllers\BackEnd\Travel\PackagesController::class, 'countryPackageCreate'])->name('package.country.create');
Route::post('/country-packages/store', [App\Http\Controllers\BackEnd\Travel\PackagesController::class, 'countryPackageStore'])->name('package.country.store');
Route::get('/country-packages/edit/{id}', [App\Http\Controllers\BackEnd\Travel\PackagesController::class, 'countryPackageEdit'])->name('package.country.edit');
Route::post('/country-packages/update', [App\Http\Controllers\BackEnd\Travel\PackagesController::class, 'countryPackageUpdate'])->name('package.country.update');

// Package Gallery
Route::get('/package-gallery', [App\Http\Controllers\BackEnd\Travel\PackagesGalleryController::class, 'index'])->name('package.gallery');
Route::get('/package-gallery/create', [App\Http\Controllers\BackEnd\Travel\PackagesGalleryController::class, 'create'])->name('package.gallery.create');
Route::post('/package-gallery/store', [App\Http\Controllers\BackEnd\Travel\PackagesGalleryController::class, 'store'])->name('package.gallery.store');
Route::get('/package-gallery/edit/{id}', [App\Http\Controllers\BackEnd\Travel\PackagesGalleryController::class, 'edit'])->name('package.gallery.edit');
Route::post('/package-gallery/update', [App\Http\Controllers\BackEnd\Travel\PackagesGalleryController::class, 'update'])->name('package.gallery.update');
Route::get('/package-gallery/{id}/destroy', [App\Http\Controllers\BackEnd\Travel\PackagesGalleryController::class, 'destroy'])->name('package.gallery.delete');

// Testimonials
Route::resource('/testimonials', App\Http\Controllers\BackEnd\Testimonials\TestimonialsController::class);

// Faq
Route::resource('faqs', App\Http\Controllers\BackEnd\Travel\FaqsController::class);
Route::get('faq/delete/{id}', [App\Http\Controllers\BackEnd\Travel\FaqsController::class, 'destroy'])->name('faqs.delete');

// Departures
Route::resource('/departures', App\Http\Controllers\BackEnd\Travel\DeparturesController::class);

// Blog
Route::resource('/blogs', App\Http\Controllers\BackEnd\BlogController::class);
Route::get('/blogs/delete/{id}', [App\Http\Controllers\BackEnd\BlogController::class, 'destroy'])->name('blogs.delete');

// Event
Route::resource('/events', App\Http\Controllers\BackEnd\EventController::class);
Route::get('/events/delete/{id}', [App\Http\Controllers\BackEnd\EventController::class, 'destroy'])->name('events.delete');

// Contact
Route::get('contacts', [App\Http\Controllers\BackEnd\ContactController::class, 'index'])->name('contacts.index');
Route::get('bookings', [App\Http\Controllers\BackEnd\BookingController::class, 'index'])->name('bookings');


// Banner
Route::resource('/banners', App\Http\Controllers\BackEnd\BannerController::class);
Route::get('banners/delete/{id}', [App\Http\Controllers\BackEnd\BannerController::class, 'destroy'])->name('banners.delete');

// Setting
Route::resource('/websites', App\Http\Controllers\BackEnd\SettingController::class);

// Role and Permission
Route::get('/role_permission', [App\Http\Controllers\BackEnd\RoleController::class, 'index'])->name('role');
Route::get('/role_permission/create', [App\Http\Controllers\BackEnd\RoleController::class, 'create'])->name('role.create');
Route::post('/role_permission/store', [App\Http\Controllers\BackEnd\RoleController::class, 'store'])->name('role.store');
Route::get('/role_permission/edit/{id}', [App\Http\Controllers\BackEnd\RoleController::class, 'edit'])->name('role.edit');
Route::post('/role_permission/update', [App\Http\Controllers\BackEnd\RoleController::class, 'update'])->name('role.update');
Route::get('/role_permission/delete/{id}/{table}', [App\Http\Controllers\BackEnd\RoleController::class, 'destroy'])->name('role.delete');

// Assign Roles
Route::get('role_permission/assign_role', [App\Http\Controllers\BackEnd\AssignroleController::class, 'index'])->name('assignrole');
Route::get('role_permission/assign_role/create', [App\Http\Controllers\BackEnd\AssignroleController::class, 'create'])->name('assignrole.create');
Route::post('role_permission/assign_role/store', [App\Http\Controllers\BackEnd\AssignroleController::class, 'store'])->name('assignrole.store');
Route::get('role_permission/assign_role/edit/{id}', [App\Http\Controllers\BackEnd\AssignroleController::class, 'edit'])->name('assignrole.edit');
Route::post('role_permission/assign_role/update', [App\Http\Controllers\BackEnd\AssignroleController::class, 'update'])->name('assignrole.update');
Route::get('role_permission/assign_role/delete/{id}/{table}', [App\Http\Controllers\BackEnd\AssignroleController::class, 'destroy'])->name('assignrole.delete');


// Miscellaneous Routes
Route::resource('/blogs', App\Http\Controllers\BackEnd\BlogController::class);
Route::resource('/teams', App\Http\Controllers\BackEnd\TeamController::class);



// Country
Route::resource('/country', App\Http\Controllers\BackEnd\CountryController::class);

// Blog Upload Image
Route::post('/blog-posts/upload', [App\Http\Controllers\BackEnd\BlogController::class, 'uploadimage']);

// Cache Clear Route
Route::get('/cache', function () {
    Artisan::call('cache:synblog');
    // Artisan::call('cache:clear');
    // Artisan::call('config:clear');
});
