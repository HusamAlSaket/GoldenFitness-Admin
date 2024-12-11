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
        Schema::table('gym_videos', function (Blueprint $table) {
            // Add the video_benefit_id column and set up the foreign key
            $table->foreignId('video_benefit_id')->nullable()->constrained('video_benefits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gym_videos', function (Blueprint $table) {
            // Drop the foreign key and column
            $table->dropForeign(['video_benefit_id']);
            $table->dropColumn('video_benefit_id');
        });
    }
};
