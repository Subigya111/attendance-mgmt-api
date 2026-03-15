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
            $table->created_at();;
            $table->expires_at();
            $table->subject();
            $table->batch();
            $table->foreignId('teacher_id')->constrained('users');
            $table->class_token();
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
