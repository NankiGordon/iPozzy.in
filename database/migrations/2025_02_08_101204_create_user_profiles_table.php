<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('suburb');
            $table->string('city')->nullable();
            $table->string('province');
            $table->string('postal');
            $table->enum('user_type', ['tenant', 'landlord']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
