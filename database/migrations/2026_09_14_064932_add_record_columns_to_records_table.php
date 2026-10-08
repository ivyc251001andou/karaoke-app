<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('records', function (Blueprint $table) {
            $table->foreignId('song_id')
                ->after('id')
                ->constrained('songs')
                ->cascadeOnDelete();

            $table->decimal('score', 5, 1)
                ->after('song_id');

            $table->text('comment')
                ->nullable()
                ->after('score');

            $table->date('sung_at')
                ->after('comment');
        });
    }

    public function down(): void
    {
        Schema::table('records', function (Blueprint $table) {
            $table->dropForeign(['song_id']);
            $table->dropColumn([
                'song_id',
                'score',
                'comment',
                'sung_at',
            ]);
        });
    }
};