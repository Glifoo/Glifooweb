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
        Schema::create('taskdependencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')
            ->constrained()
            ->onDelete('cascade');
            $table->unsignedBigInteger('dependens_on_task_id');

            $table->foreign('dependens_on_task_id')
            ->references('id')
            ->on('tasks')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taskdependencies');
    }
};
