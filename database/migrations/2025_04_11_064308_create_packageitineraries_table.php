<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageitinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->nullable()->nullOnDelete('cascade');
            $table->text('title');
            $table->text('car')->nullable();
            $table->text('walk')->nullable();
            $table->text('flight')->nullable();
            $table->text('distance')->nullable();
            $table->text('accommodation')->nullable();
            $table->text('meal')->nullable();
            $table->text('overnight')->nullable();
            $table->text('breakfast')->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packageitineraries');
    }
}
