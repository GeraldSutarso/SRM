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
        Schema::create('map_technical', function (Blueprint $table) {
            $table->id('mt_id');
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id')->references('asset_id')->on('assets');
            $table->text('t_description');
            $table->text('mt_owner');
            $table->longText('t_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_technical');
    }
};