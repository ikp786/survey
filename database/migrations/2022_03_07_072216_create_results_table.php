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
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('survey_creater_id');
            $table->unsignedBigInteger('survey_taker_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('option_id');
            $table->string('question_type');
            $table->string('option_type');            
            $table->string('option_value');
            $table->foreign('survey_creater_id')->references('id')->on('surveys');
            $table->foreign('survey_taker_id')->references('id')->on('surveys');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('option_id')->references('id')->on('options');
            $table->softDeletes();
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
        Schema::dropIfExists('results');
    }
};
