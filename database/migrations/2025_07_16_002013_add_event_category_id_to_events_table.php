<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Tambah foreign key, set null jika kategori dihapus
            $table->foreignId('event_category_id')
                  ->nullable()
                  ->after('slug')
                  ->constrained('event_categories')
                  ->onDelete('set null');

            // Hapus kolom 'category' yang lama jika ada
            if (Schema::hasColumn('events', 'category')) {
                $table->dropColumn('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['event_category_id']);
            $table->dropColumn('event_category_id');
            $table->string('category')->nullable(); // Kembalikan kolom lama
        });
    }
};