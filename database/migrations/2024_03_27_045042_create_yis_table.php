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
        Schema::create('yis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->decimal('min', 11, 3);
            $table->decimal('max', 11, 3);
            $table->decimal('minmax', 11, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yis');
    }
};
