<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'departure_date', 'package_id',
        'group_size', 'message', 'user_ip', 'destination_id', 'source','uuid','page','type','amount'
    ];

    public function destination() {
		return $this->belongsTo(Destination::class);
	}
	public function package() {
		return $this->belongsTo(Package::class);
	}
}
