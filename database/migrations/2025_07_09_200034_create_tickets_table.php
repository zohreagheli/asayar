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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('عنوان');
            $table->string('گروه');
            $table->enum('اولویت', ['پایین', 'متوسط', 'بالا']);
            $table->text('توضیحات');
            $table->foreignId('user_id')->constrained(); // اگر احراز هویت دارید
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
