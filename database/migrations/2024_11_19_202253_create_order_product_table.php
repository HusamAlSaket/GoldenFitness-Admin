<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // foreign key to Orders table
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // foreign key to Products table
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Composite primary key
            $table->primary(['order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
