<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDestination extends Model
{
    protected $table = "categories_destinations";
    protected $fillable = [
    	'name', 'destination_id', 'category_id', 'details', 'status'
    ];

    public function destination() {
    	return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function places() {
        return $this->hasMany(CategoryPlace::class, 'category_destination_id');
    }


    public function packages() {
        return $this->hasMany(Package::class, 'category_destination_id');
    }

}
