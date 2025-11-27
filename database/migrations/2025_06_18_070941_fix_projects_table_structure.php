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
        Schema::table('projects', function (Blueprint $table) {
            // بررسی وجود ستون‌ها قبل از اضافه کردن
            if (!Schema::hasColumn('projects', 'deadline')) {
                $table->date('deadline')->nullable()->after('description');
            }

            // تغییر نام ستون اگر وجود دارد
            if (Schema::hasColumn('projects', 'user_id') && !Schema::hasColumn('projects', 'created_by')) {
                $table->renameColumn('user_id', 'created_by');
            }
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // برگرداندن تغییرات
            if (Schema::hasColumn('projects', 'deadline')) {
                $table->dropColumn('deadline');
            }

            if (Schema::hasColumn('projects', 'created_by')) {
                $table->renameColumn('created_by', 'user_id');
            }
        });
        }
};
