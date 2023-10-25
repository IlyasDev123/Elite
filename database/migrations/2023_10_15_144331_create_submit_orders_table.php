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
        Schema::create('submit_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('admins')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_reviewed')->default(false);
            $table->integer('no_of_review')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit_orders');
    }
};
