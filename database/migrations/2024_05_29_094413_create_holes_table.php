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
        Schema::create('holes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_center')->constrained('centers');
            $table->string('name');
            $table->string('bio');
            $table->text('description');   
            $table->string('picture');   
            $table->string('statuse')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holes');
    }
};
