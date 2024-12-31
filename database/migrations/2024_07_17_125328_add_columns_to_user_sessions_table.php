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
        Schema::table('user_sessions', function (Blueprint $table) {
            $table->integer('input_500_c')->nullable()->after('input_100000');
            $table->integer('input_1000_c')->nullable()->after('input_500_c');
            $table->integer('input_2000_c')->nullable()->after('input_1000_c');
            $table->integer('input_5000_c')->nullable()->after('input_2000_c');
            $table->integer('input_10000_c')->nullable()->after('input_5000_c');
            $table->integer('input_20000_c')->nullable()->after('input_10000_c');
            $table->integer('input_50000_c')->nullable()->after('input_20000_c');
            $table->integer('input_100000_c')->nullable()->after('input_50000_c');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_sessions', function (Blueprint $table) {
            $table->dropColumn([
                'input_500_c',
                'input_1000_c',
                'input_2000_c',
                'input_5000_c',
                'input_10000_c',
                'input_20000_c',
                'input_50000_c',
                'input_100000_c'
            ]);
        });
    }
};
