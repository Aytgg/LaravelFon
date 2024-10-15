<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('yatirimciSayisi'))
            Schema::create('yatirimciSayisi', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('fon_id')
                    ->foreign('fon_id')->references('id')->on('fons')
                    ->onDelete('cascade');
                $table->integer('yatirimciSayisi')->min(0);
                $table->date('date');
            });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::drop('yatirimciSayisi');
    }
};
