<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('video_benefits', function (Blueprint $table) {
            $table->enum('benefit', ['premium', 'free'])->nullable()->change(); // Modify the column to enum
        });
    }

    public function down(): void
    {
        Schema::table('video_benefits', function (Blueprint $table) {
            $table->string('benefit')->nullable()->change(); // Revert to string if needed
        });
    }
};
