<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('attendee_name');

            $table->foreignId('attendee_id')
                  ->nullable()
                  ->after('ticket_id')
                  ->constrained('attendees')
                  ->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['attendee_id']);
            $table->dropColumn('attendee_id');
            $table->string('attendee_name');
        });
    }
};