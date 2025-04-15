<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('destination_id');
            $table->integer('package_id');
            $table->text('message')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('source')->nullable();
            $table->string('agent')->nullable();
            $table->integer('group_size')->nullable();
            $table->string('user_ip')->nullable();
            $table->string('payment_id')->nullable();
            $table->uuid('uuid');
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
        Schema::dropIfExists('bookings');
    }
}
