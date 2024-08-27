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
        Schema::disableForeignKeyConstraints();

        Schema::create('dusun_detail', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreign('dusun_id')->references('id')->on('dusun');
            $table->string('name', 20)->index();
            $table->string('description');
            $table->string('foto');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dusun_detail');
    }
};
