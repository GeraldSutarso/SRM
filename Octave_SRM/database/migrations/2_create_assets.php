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
        Schema::create('assets', function (Blueprint $table) {
            $table->id('asset_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('owner');
            $table->enum('a_department',['IT','HR','Logistic','Engineering','RnD','FA','Sales','BD','PPIC']);
            $table->string('asset_name');
            $table->text('asset_desc');
            $table->text('SR_confidentiality');
            $table->text('SR_integrity');
            $table->text('SR_availability');
            $table->enum('most_important_SR',['Confidentiality','Integrity','Availability']);
            $table->text('rationale_for_select');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
