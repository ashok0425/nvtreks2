<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	protected $table = "packages";
    protected $appends = ['testimonial_count', 'testimonial_avg'];

	protected $fillable = ['name',
	'overview',
	'outline_itinerary',
	'detailed_itinerary',
	'include_exclude',
	'useful_info',
	'route_map',
	'departure',
	'price',
	'destination_id',
	'category_id',
	'category_destination_id',
	'status',
	'duration',
	'max_altitude',
	'difficulty',
	'min_people_required',
	'deal_package',
	'special_package',
	'order',
	'activity',
	'meals',
	'room',
	'transport',
	'best_month'];




	public function destination() {
		return $this->belongsTo(Destination::class, 'destination_id');
	}

	public function category() {
		return $this->belongsTo(CategoryDestination::class, 'category_destination_id');
	}


	public function place() {
		return $this->belongsTo(CategoryPlace::class, 'category_place_id');
	}

	public function faqs() {
		return $this->hasMany('App\Models\Faq', 'package_id');
	}

	public function itenaries() {
		return $this->hasMany(PackageItinerary::class, 'package_id');
	}

	public function departure_dates() {
		return $this->hasMany('App\Models\Departure', 'package_id');
	}

	public function testimonials() {
		return $this->belongsToMany('App\Models\Testimonial', 'package_testimonial', 'package_id', 'testimonial_id');
    }

    // Accessor for testimonial count
public function getTestimonialCountAttribute()
{
    return $this->testimonials()->count();
}

// Accessor for testimonial average rating
public function getTestimonialAvgAttribute()
{
    return number_format($this->testimonials()->avg('rating'),1);
}

public function package_images()
{
    return $this->hasMany(PackageImage::class);
}

public function feature_packages()
{
    return $this->hasMany(PackageFeatrured::class);
}


public function featuredPackage()
{
    return $this->belongsToMany(Package::class,'package_featured','package_id','featured_id');
}


	public function Country($country_id) {
		return $this->belongsToMany('App\Models\Country', 'country_package', 'package_id', 'country_id')->withPivot('overview','faq','outline_itinerary','detailed_itinerary','include_exclude','trip_excludes','useful_info','page_title','meta_keywords','meta_author','meta_description','mobile_meta_keyword','mobile_meta_title','mobile_meta_description','name','currency','price','offer_price')->where('country_id',$country_id)->first();
    }

}
