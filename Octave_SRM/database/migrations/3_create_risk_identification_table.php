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
        Schema::create('risk_identification', function (Blueprint $table) {
            $table->id('AoC_id');
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id')->references('asset_id')->on('assets');
            $table->text('area_of_concern');
            $table->string('actor');
            $table->text('objective');
            $table->text('motive');
            $table->text('result');
            $table->text('security_needs');
            $table->text('probability');
            $table->text('consequences');
            $table->text('control');
            $table->timestamp('date_created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_identification');
    }
};
