<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('t_v_series', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('stream');
        $table->string('language');
        $table->string('country');
        $table->string('genre');
        $table->longText('short_intro')->nullable(); // Ensure column is created
        $table->integer('complete_season');
        $table->boolean('is_stream_over')->default(false);
        $table->string('image')->nullable();
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('tv_series');
    }
};
