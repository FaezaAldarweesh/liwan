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
        Schema::create('booking_workspaces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_disk');
            $table->unsignedBigInteger('id_plan');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_disk')->references('id')->on('disks')->onDelete('cascade');
            $table->foreign('id_plan')->references('id')->on('plane_workspaces')->onDelete('cascade');
            $table->date('date');
            $table->integer('total_price');
            $table->string('statuse');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_workspaces');
    }
};
