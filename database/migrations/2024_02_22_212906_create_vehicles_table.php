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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehiclename');
            $table->foreignId('companyId')->constrined('truck_companies');
            $table->foreignId('createdBy')->constrined('users');
            $table->string('vehiclereg')->nullable();
            $table->string('vehiclechasis')->nullable();
            $table->string('gpsId')->nullable();
            $table->string('lastlocation')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
