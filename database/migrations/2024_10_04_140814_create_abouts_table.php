<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('vision_ar')->nullable();
            $table->text('vision_en')->nullable();
            $table->string('vision_img')->nullable();
            $table->text('goals_ar')->nullable();
            $table->text('goals_en')->nullable();
            $table->string('goals_img')->nullable();
            $table->text('message_ar')->nullable();
            $table->text('message_en')->nullable();
            $table->string('message_img')->nullable();
            $table->text('solutions_ar')->nullable();
            $table->text('solutions_en')->nullable();
            $table->string('solutions_img')->nullable();
            $table->text('strategy_ar')->nullable();
            $table->text('strategy_en')->nullable();
            $table->string('strategy_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
};
