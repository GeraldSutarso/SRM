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
        Schema::create('severity', function (Blueprint $table) {
            $table->foreignId('AoC_id')->primary()->constrained(
                table: 'risk_identification', column:'AoC_id'
            )->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('AoC_id')->references('AoC_id')->on('risk_identification')->primary()->onDelete('cascade');
            $table->enum('financial_value',['high','medium','low']);
            $table->enum('productivity_value',['high','medium','low']);
            $table->enum('rep_value',['high','medium','low']);
            $table->enum('safety_value',['high','medium','low']);
            $table->enum('fines_value',['high','medium','low']);
            $table->enum('financial_score',['1','2','3','4','5','6','7','8','9','10']);
            $table->enum('productivity_score',['1','2','3','4','5','6','7','8','9','10']);
            $table->enum('rep_score',['1','2','3','4','5','6','7','8','9','10']);
            $table->enum('safety_score',['1','2','3','4','5','6','7','8','9','10']);
            $table->enum('fines_score',['1','2','3','4','5','6','7','8','9','10']);
            $table->integer('rr_score',$autoIncrement = false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('severity');
    }
};
