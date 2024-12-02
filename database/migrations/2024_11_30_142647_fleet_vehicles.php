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
        Schema::create('fleet_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number');
            $table->unsignedInteger('km_driven');
            $table->unsignedInteger('total_drive_time_in_minutes');
            $table->unsignedInteger('max_tonnage_kg');
            $table->boolean('status');
            $table->date('last_driven_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fleet_vehicles');
    }
};
