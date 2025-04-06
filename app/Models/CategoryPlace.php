<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPlace extends Model
{
    protected $table = "categories_places";
    protected $fillable = [
    	'name', 'details', 'status', 'category_destination_id'
    ];

    public function category_destination() {
    	return $this->belongsTo(CategoryDestination::class, 'category_destination_id');
    }


    public function packages() {
        return $this->hasMany(Package::class, 'category_place_id');
    }

}
