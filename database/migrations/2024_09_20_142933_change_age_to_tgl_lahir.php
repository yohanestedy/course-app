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
        Schema::table('warga', function (Blueprint $table) {
            $table->date('tgl_lahir')->nullable();
        });

        // Schema::table('posts', function (Blueprint $table) {
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
