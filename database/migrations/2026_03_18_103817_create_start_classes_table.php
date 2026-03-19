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
        Schema::create('start_classes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->useCurrent();
            // $table->expires_at();
            $table->string('subject');
            $table->integer('semester');
            $table->foreignId('teacher_id')->constrained('users');
            $table->string('classToken');       
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('start_classes');
    }
};
