<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
	protected $table = "destinations";
	protected $fillable = [
		'name', 'image', 'details', 'status','order'
	];

	public function categories() {
		return $this->hasMany(CategoryDestination::class, 'destination_id');
	}

	public function packages() {
		return $this->hasMany(Package::class, 'destination_id');
	}

    public function places() {
		return $this->hasMany(CategoryPlace::class, 'destination_id');
	}


}
