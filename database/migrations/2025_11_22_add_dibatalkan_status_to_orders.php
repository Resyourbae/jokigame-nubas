<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify the status enum to include 'dibatalkan'
        Schema::table('orders', function (Blueprint $table) {
            // For MySQL, we need to modify the enum
            DB::statement("ALTER TABLE orders CHANGE COLUMN status status ENUM('menunggu', 'diproses', 'diterima', 'ditolak', 'dibatalkan') DEFAULT 'menunggu'");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::statement("ALTER TABLE orders CHANGE COLUMN status status ENUM('menunggu', 'diproses', 'diterima', 'ditolak') DEFAULT 'menunggu'");
        });
    }
};
