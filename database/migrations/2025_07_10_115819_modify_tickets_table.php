<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            // تغییر نوع enum اولویت
            DB::statement("ALTER TABLE tickets MODIFY `اولویت` ENUM('low', 'medium', 'high')");

            // تغییر نام ستون‌ها
            $table->renameColumn('عنوان', 'title');
            $table->renameColumn('گروه', 'category');
            $table->renameColumn('اولویت', 'priority');
            $table->renameColumn('توضیحات', 'description');

            // اضافه کردن ستون جدید برای فایل ضمیمه
            $table->string('attachment_path')->nullable()->after('description');
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            // حذف ستون اضافه شده
            $table->dropColumn('attachment_path');

            // بازگرداندن نام ستون‌ها
            $table->renameColumn('title', 'عنوان');
            $table->renameColumn('category', 'گروه');
            $table->renameColumn('priority', 'اولویت');
            $table->renameColumn('description', 'توضیحات');

            // بازگرداندن نوع enum اولویت
            DB::statement("ALTER TABLE tickets MODIFY `اولویت` ENUM('پایین', 'متوسط', 'بالا')");
        });
    }
};
