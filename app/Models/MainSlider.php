<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
	protected $table = "main_slider";
	protected $fillable = [
		'image', 'title', 'details', 'status'
	];

}
