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
        Schema::table('tasks', function (Blueprint $table) {
        // اضافه کردن ستون‌ها با بررسی وجود قبلی
                if (!Schema::hasColumn('tasks', 'project_id')) {
                    $table->unsignedBigInteger('project_id')->nullable();
                }

                if (!Schema::hasColumn('tasks', 'assigned_to')) {
                    $table->unsignedBigInteger('assigned_to')->nullable();
                }

                if (!Schema::hasColumn('tasks', 'priority')) {
                    $table->string('priority')->default('medium');
                }

                if (!Schema::hasColumn('tasks', 'status')) {
                    $table->string('status')->default('todo');
                }
            });

            // اضافه کردن constraintها به صورت جداگانه
            Schema::table('tasks', function (Blueprint $table) {
                $table->foreign('project_id')->references('id')->on('projects');
                $table->foreign('assigned_to')->references('id')->on('users');
            });
        }
        public function down()
        {
            Schema::table('tasks', function (Blueprint $table) {
                $table->dropForeign(['project_id']);
                $table->dropForeign(['assigned_to']);
                $table->dropColumn(['project_id', 'assigned_to', 'priority', 'status']);
            });
        }
    };
