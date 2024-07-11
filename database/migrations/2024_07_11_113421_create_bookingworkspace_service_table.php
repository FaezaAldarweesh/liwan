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
        Schema::create('bookinghole_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_workspace_id');
            $table->unsignedBigInteger('services_id');
            $table->foreign('booking_workspace_id')->references('id')->on('booking_workspaces')->onDelete('cascade');
            $table->foreign('services_id')->references('id')->on('workspace_services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookinghole_service');
    }
};
