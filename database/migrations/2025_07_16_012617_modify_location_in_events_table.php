<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Tambahkan kolom baru untuk koordinat setelah location_city
            $table->decimal('latitude', 10, 8)->nullable()->after('location_city');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');

            // Hapus kolom embed yang lama jika ada
            if (Schema::hasColumn('events', 'location_map_embed')) {
                $table->dropColumn('location_map_embed');
            }
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
            $table->text('location_map_embed')->nullable(); // Kembalikan kolom lama
        });
    }
};