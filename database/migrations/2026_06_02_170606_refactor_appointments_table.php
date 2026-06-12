<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('appointments', function (Blueprint $table) {

            // زمان‌بندی قدیمی
            $table->dropColumn([
                'start_time',
                'end_time'
            ]);

            // تغییر نام فیلدها
            $table->renameColumn('date', 'preferred_date');
            $table->renameColumn('time', 'preferred_time');

            // سرویس‌کار اختیاری شود
            $table->unsignedBigInteger('technician_id')->nullable()->change();

            // توضیحات درخواست
            $table->text('description')->nullable()->after('address');

            // فایل ضمیمه
            $table->string('attachment')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {

            $table->renameColumn('preferred_date', 'date');
            $table->renameColumn('preferred_time', 'time');

            $table->dateTime('start_time');
            $table->dateTime('end_time');

            $table->dropColumn([
                'description',
                'attachment'
            ]);
        });
    }
};
