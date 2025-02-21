<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('property_name');
            $table->string('property_type');
            $table->text('description')->nullable();
            $table->integer('bedrooms');
            $table->integer('bathrooms')->nullable();
            $table->integer('size');
            $table->json('amenities')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('suburb');
            $table->string('city')->nullable();
            $table->string('province');
            $table->string('postal');
            $table->date('available_date')->nullable();
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
};
