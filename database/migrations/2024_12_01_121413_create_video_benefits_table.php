<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('video_benefits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gym_video_id')
                ->constrained('gym_videos') // Connect to the gym_videos table
                ->onDelete('cascade');
            $table->string('benefit'); // Stores individual benefits
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('video_benefits');
    }
};
