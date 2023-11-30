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
        Schema::create('priority', function (Blueprint $table) {
            $table->foreignId('asset_id')->primary()->constrained(
                table:'assets',column:'asset_id',indexName:'FK_PK_asset_id-Priority'
            );
            $table->enum('trust',['1','2','3','4','5']);
            $table->enum('finance',['1','2','3','4','5']);
            $table->enum('productivity',['1','2','3','4','5']);
            $table->enum('safety',['1','2','3','4','5']);
            $table->enum('fines',['1','2','3','4','5']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priority');
    }
};
