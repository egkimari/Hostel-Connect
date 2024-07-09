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
                $table->id('booking_id'); // Define booking_id as primary key
                $table->foreignId('hostel_id')->constrained()->onDelete('cascade'); // Define hostel_id with fk1 name
                $table->date('checkin_date');
                $table->date('checkout_date');
                $table->text('preferences')->nullable();
                $table->timestamps();
            });
        }
    
        public function down()
        {
            Schema::dropIfExists('bookings');
        }
    }
