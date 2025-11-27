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
        Schema::table('orders', function (Blueprint $table) {
            $table->text('status_message')->nullable()->after('admin_notes')->comment('Pesan status untuk user');
            $table->timestamp('cancelled_at')->nullable()->after('status_message')->comment('Waktu pembatalan order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['status_message', 'cancelled_at']);
        });
    }
};
