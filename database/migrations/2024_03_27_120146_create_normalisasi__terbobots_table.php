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
        Schema::create('normalisasi__terbobots', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->integer('kriteria');
            $table->decimal('nilai', 11, 3);
            // $table->decimal('kriteria_2', 11, 3);
            // $table->decimal('kriteria_3', 11, 3);
            // $table->decimal('kriteria_4', 11, 3);
            // $table->decimal('kriteria_5', 11, 3);
            // $table->decimal('kriteria_6', 11, 3);
            // $table->decimal('kriteria_7', 11, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('normalisasi__terbobots');
    }
};
