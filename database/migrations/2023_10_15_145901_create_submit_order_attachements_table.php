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
        Schema::create('submit_order_attachements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submit_order_id')->constrained('submit_orders')->onDelete('cascade');
            $table->string('attachment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submit_order_attachements');
    }
};
