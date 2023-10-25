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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('no_of_color')->nullable();
            $table->string('name_of_color')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('unit')->nullable(); // inch, cm, mm
            $table->string('type')->nullable(); // DST, EMB, PES, XXX, EXP, HUS, JEF, VIP, VP3, SEW, PCS, CSD, PCM, PCQ, PCD, PEC, SHV, DST, EMB, PES, XXX, EXP, HUS, JEF, VIP, VP3, SEW, PCS, CSD, PCM, PCQ, PCD, PEC, SHV
            $table->string('time_frame')->nullable(); // 1-2 days, 3-4 days, 5-6 days, 7-8 days, 9-10 days, 11-12 days, 13-14 days, 15-16 days, 17-18 days, 19-20 days, 21-22 days, 23-24 days, 25-26 days, 27-28 days, 29-30 days
            $table->tinyInteger('threading_cute_size')->nullable();
            $table->string('placement')->nullable();
            $table->boolean('applique')->default(false);
            $table->string('design_format')->nullable();
            $table->string('other_format')->nullable();
            $table->text('extra_instruction')->nullable();
            $table->tinyInteger('order_type')->comment("[1 => digitizing, 2 => vector , custom-clothing => 3, custom-patch => 4]")->default(1);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
