<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('artist')->after('title');
            $table->string('era')->nullable()->after('artist');
            $table->string('genre')->nullable()->after('era');
        });
    }

    public function down(): void
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn(['title', 'artist', 'era', 'genre']);
        });
    }
};