<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('song_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('score', 5, 2);
            $table->text('comment')->nullable();
            $table->date('sung_at');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};