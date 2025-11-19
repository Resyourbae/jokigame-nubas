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
            // Add columns only if they don't exist
            if (!Schema::hasColumn('orders', 'account_id')) {
                $table->string('account_id')->nullable()->after('contact');
            }
            if (!Schema::hasColumn('orders', 'account_platform')) {
                $table->string('account_platform')->nullable()->after('account_id');
            }
            if (!Schema::hasColumn('orders', 'price')) {
                $table->decimal('price', 12, 2)->default(0);
            }
            if (!Schema::hasColumn('orders', 'days')) {
                $table->integer('days')->default(1);
            }
            if (!Schema::hasColumn('orders', 'per_day_price')) {
                $table->decimal('per_day_price', 12, 2)->default(0);
            }
            if (!Schema::hasColumn('orders', 'admin_note')) {
                $table->string('admin_note')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'game_id',
                'customer_name',
                'contact',
                'account_id',
                'account_platform',
                'details',
                'price',
                'days',
                'per_day_price',
                'status',
                'admin_note'
            ]);
        });
    }
};
