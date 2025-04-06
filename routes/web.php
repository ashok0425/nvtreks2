<?php

   use Illuminate\Support\Facades\Route;


// index page
    Route::get('/','HomeController@home')->name('/');
	Route::get('cms/{page?}','HomeController@Page')->name('cms.page');
	Route::get('cms-page/{page}/{id?}','HomeController@PageDetail')->name('cms.detail');
	Route::get('contact','ContactController@index')->name('contactus');
	Route::post('contact','ContactController@store')->name('contactus.store');
	Route::get('destination/{url}','DestinationController@index')->name('destination');
	Route::get('package-all/','PackageController@all')->name('package.all');
	Route::get('filter_package}','PackageController@Filter_Package')->name('filter_package');
	Route::get('package-destination/{url}','PackageController@destination')->name('package.destination');
	Route::get('package-category/{url}','PackageController@category')->name('package.category');
	Route::get('deals','PackageController@Deals')->name('deals');
	Route::get('package-place/{url}','PackageController@place')->name('package.place');
	Route::get('{country?}/package-detail/{url?}','PackageController@show')->name('package.detail');
	Route::get('package-detail/{url?}','PackageController@show')->name('package.detail');
	Route::get('book-now/{url?}/{date?}','BuyController@index')->name('booknow');
	Route::post('booking/step2','BuyController@step2')->name('booking.step2');
	Route::post('booking/store','BuyController@store')->name('booking.step2.store');
	Route::get('booking-online/{id?}','BuyController@payonline')->name('booking.online');
	Route::post('payment-confirmation/','BuyController@Confirmation')->name('booking.confirmation');
	Route::any('payment', 'BuyController@getPayment')->name('payment-from-bank');
	Route::any('payment-success', 'BuyController@getPayment')->name('payment-from-bank-reponse');
	Route::any('pay-thankyou', 'BuyController@thanku')->name('pay.thanku');
	Route::any('payment-failed', function(){
		return view('frontend.failed');
	})->name('failed');


	Route::get('package/print/{package}','PackageController@printpackage')->name('print');



	Route::get('load-category/{data}','DestinationController@loadCategory');
	Route::get('search-package','DestinationController@search')->name('search');
	Route::get('get-ajax-package','DestinationController@getAjaxpackage');


	Route::get('blogs','BlogController@index')->name('blog');
	Route::get('blog-detail/{url}','BlogController@show')->name('blog.detail');
	Route::post('filterBlog}','BlogController@filterBlog')->name('filterBlog');


	Route::get('events','EventController@index')->name('events');
		Route::get('useful-info','EventController@UsefulInfo')->name('usefulinfo');

	Route::get('event-detail/{id}','EventController@show')->name('event.detail');


	Route::post('enquery-post','ContactController@Enquery')->name('enquery.post');
	Route::get('event-detail/{id}','EventController@show')->name('event.detail');
	Route::get('departure-date','PackageController@Departure')->name('departure');


	Route::get('testimonials/{package?}','PackageController@Testimonial')->name('testimonials');
	Route::post('testimonials/store','PackageController@testimonialStore')->name('testimonials.store');


	Route::post('subscribe/store','ContactController@subscribeStore')->name('subscribe.store');

// 	Route::get('sitemap.xml','SiteMapController@siteMap');

		Route::get('itinerary/{id?}/{d?}',function(){
		    return redirect('https://nepalvisiontreks.com/package-category/trekking');
		});

		Route::get('load-quick-trip',function(){
		   return view('frontend.template.quick_trip');
		});


		Route::get('blog/{assa}',function(){
		    return redirect()->route('blog');
		});


