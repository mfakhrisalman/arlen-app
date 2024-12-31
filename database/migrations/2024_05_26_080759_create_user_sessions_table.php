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
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('input_500');
            $table->integer('input_1000');
            $table->integer('input_2000');
            $table->integer('input_5000');
            $table->integer('input_10000');
            $table->integer('input_20000');
            $table->integer('input_50000');
            $table->integer('input_100000');
            $table->string('amount_open');
            $table->string('amount_closed')->nullable();
            $table->string('gap')->nullable();
            $table->boolean('status');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sessions');
    }
};
