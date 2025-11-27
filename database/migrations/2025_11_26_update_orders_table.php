<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop old rank columns jika ada
            if (Schema::hasColumn('orders', 'rank_from_id')) {
                $table->dropForeignIdFor('RankTier', 'rank_from_id');
                $table->dropColumn('rank_from_id');
            }
            if (Schema::hasColumn('orders', 'rank_to_id')) {
                $table->dropForeignIdFor('RankTier', 'rank_to_id');
                $table->dropColumn('rank_to_id');
            }
            if (Schema::hasColumn('orders', 'service_type')) {
                $table->dropColumn('service_type');
            }

            // Add new columns
            $table->string('username')->nullable()->comment('Username game user');
            $table->string('server')->nullable()->comment('Server tempat user bermain');
            $table->integer('target_matches')->nullable()->comment('Jumlah match target (untuk winrate)');
            $table->foreignId('game_rank_from_id')->nullable()->constrained('game_ranks')->onDelete('set null')->comment('Rank awal');
            $table->foreignId('game_rank_to_id')->nullable()->constrained('game_ranks')->onDelete('set null')->comment('Rank tujuan');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeignIdFor('GameRank', 'game_rank_from_id');
            $table->dropForeignIdFor('GameRank', 'game_rank_to_id');
            $table->dropColumn(['username', 'server', 'target_matches', 'game_rank_from_id', 'game_rank_to_id']);
        });
    }
};
