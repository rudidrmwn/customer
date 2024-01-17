<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('province_name');
            $table->timestamps();
        });
  
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('cities_name');
            $table->integer('province_id'); 
            $table->timestamps();
        });

        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('current_position_bank_account');
            $table->timestamps();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date')->nullable();
            $table->string('phone_number');
            $table->string('email_address')->nullable();
            $table->integer('province_address')->nullable();
            $table->integer('city_address')->nullable();
            $table->text('street_address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('ktp_number');
            $table->integer('current_position_bank_account')->nullable();
            $table->string('bank_account')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('profiles');
    }
};
