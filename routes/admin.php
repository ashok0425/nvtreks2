<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\Admin\AuthController::class, 'store'])->name('login');
Route::get('/dashboard', [App\Http\Controllers\Admin\AuthController::class, 'show'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\Admin\AuthController::class, 'profile'])->name('profile');
Route::post('profile/update-profile', [App\Http\Controllers\Admin\AuthController::class, 'update'])->name('profile.update');
Route::post('profile/change-password', [App\Http\Controllers\Admin\AuthController::class, 'changePassword'])->name('password');
Route::get('profile/change-password', [App\Http\Controllers\Admin\AuthController::class, 'getpassword'])->name('password');
Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'destroy'])->name('logout');

// Destination
Route::resource('/destinations', App\Http\Controllers\Admin\Travel\DestinationsController::class);
Route::get('/destinations/delete/{id}', [App\Http\Controllers\Admin\Travel\DestinationsController::class, 'destroy'])->name('destination.delete');

// Destination category
Route::resource('/categories-destinations', App\Http\Controllers\Admin\Travel\CategoriesDestinationsController::class);

// Category Region
Route::resource('/categories-places', App\Http\Controllers\Admin\Travel\CategoriesPlacesController::class);

// Packages
Route::resource('/packages', App\Http\Controllers\Admin\Travel\PackagesController::class);
Route::get('/country-packages', [App\Http\Controllers\Admin\Travel\PackagesController::class, 'countryPackage'])->name('package.country');
Route::get('/country-packages/create', [App\Http\Controllers\Admin\Travel\PackagesController::class, 'countryPackageCreate'])->name('package.country.create');
Route::post('/country-packages/store', [App\Http\Controllers\Admin\Travel\PackagesController::class, 'countryPackageStore'])->name('package.country.store');
Route::get('/country-packages/edit/{id}', [App\Http\Controllers\Admin\Travel\PackagesController::class, 'countryPackageEdit'])->name('package.country.edit');
Route::post('/country-packages/update', [App\Http\Controllers\Admin\Travel\PackagesController::class, 'countryPackageUpdate'])->name('package.country.update');

// Package Gallery
Route::get('/package-gallery', [App\Http\Controllers\Admin\Travel\PackagesGalleryController::class, 'index'])->name('package.gallery');
Route::get('/package-gallery/create', [App\Http\Controllers\Admin\Travel\PackagesGalleryController::class, 'create'])->name('package.gallery.create');
Route::post('/package-gallery/store', [App\Http\Controllers\Admin\Travel\PackagesGalleryController::class, 'store'])->name('package.gallery.store');
Route::get('/package-gallery/edit/{id}', [App\Http\Controllers\Admin\Travel\PackagesGalleryController::class, 'edit'])->name('package.gallery.edit');
Route::post('/package-gallery/update', [App\Http\Controllers\Admin\Travel\PackagesGalleryController::class, 'update'])->name('package.gallery.update');
Route::get('/package-gallery/{id}/destroy', [App\Http\Controllers\Admin\Travel\PackagesGalleryController::class, 'destroy'])->name('package.gallery.delete');

// Testimonials
Route::resource('/testimonials', App\Http\Controllers\Admin\Testimonials\TestimonialsController::class);
Route::resource('faqs', App\Http\Controllers\Admin\Travel\FaqsController::class);
Route::resource('/departures', App\Http\Controllers\Admin\Travel\DeparturesController::class);
Route::resource('/blogs', App\Http\Controllers\Admin\BlogController::class);

// Event
Route::resource('/events', App\Http\Controllers\Admin\EventController::class);
Route::get('/events/delete/{id}', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('events.delete');

// Contact
Route::get('contacts', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
Route::get('subscribers', [App\Http\Controllers\Admin\ContactController::class, 'subscriber'])->name('subscriber');
Route::get('bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings');


// Banner
Route::resource('/banners', App\Http\Controllers\Admin\BannerController::class);

// Setting
Route::resource('/websites', App\Http\Controllers\Admin\SettingController::class);

// Role and Permission
Route::get('/role_permission', [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('role');
Route::get('/role_permission/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('role.create');
Route::post('/role_permission/store', [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('role.store');
Route::get('/role_permission/edit/{id}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('role.edit');
Route::post('/role_permission/update', [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('role.update');
Route::get('/role_permission/delete/{id}/{table}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('role.delete');

// Assign Roles
Route::get('role_permission/assign_role', [App\Http\Controllers\Admin\AssignroleController::class, 'index'])->name('assignrole');
Route::get('role_permission/assign_role/create', [App\Http\Controllers\Admin\AssignroleController::class, 'create'])->name('assignrole.create');
Route::post('role_permission/assign_role/store', [App\Http\Controllers\Admin\AssignroleController::class, 'store'])->name('assignrole.store');
Route::get('role_permission/assign_role/edit/{id}', [App\Http\Controllers\Admin\AssignroleController::class, 'edit'])->name('assignrole.edit');
Route::post('role_permission/assign_role/update', [App\Http\Controllers\Admin\AssignroleController::class, 'update'])->name('assignrole.update');
Route::get('role_permission/assign_role/delete/{id}/{table}', [App\Http\Controllers\Admin\AssignroleController::class, 'destroy'])->name('assignrole.delete');


// Miscellaneous Routes
Route::resource('/blogs', App\Http\Controllers\Admin\BlogController::class);
Route::resource('/teams', App\Http\Controllers\Admin\TeamController::class);



// Country
Route::resource('/country', App\Http\Controllers\Admin\CountryController::class);

// Blog Upload Image
Route::post('/blog-posts/upload', [App\Http\Controllers\Admin\BlogController::class, 'uploadimage']);

// Cache Clear Route
