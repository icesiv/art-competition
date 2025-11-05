<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id', 20)->unique();
            $table->string('name');
            $table->string('grade', 100);
            $table->string('parents_name');
            $table->string('parents_phone', 20);
            $table->string('email')->nullable();
            $table->text('home_address');
            $table->string('school');
            $table->string('another_phone', 20)->nullable();
            $table->timestamps();
            
            $table->index('registration_id');
            $table->index('parents_phone');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};