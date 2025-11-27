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
    Schema::table('projects', function (Blueprint $table) {
        // فقط ستون‌هایی که وجود ندارند را اضافه کنید
        if (!Schema::hasColumn('projects', 'deadline')) {
            $table->date('deadline')->nullable()->after('description');
        }

        if (!Schema::hasColumn('projects', 'created_by')) {
            $table->foreignId('created_by')->constrained('users')->after('deadline');
        }
    });
}
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['deadline', 'created_by']);
        });
    }
};
