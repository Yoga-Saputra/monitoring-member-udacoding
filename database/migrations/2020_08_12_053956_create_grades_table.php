<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_1')->nullable();
            $table->integer('submission_1')->nullable();
            $table->integer('submission_2')->nullable();
            $table->integer('submission_3')->nullable();
            $table->integer('exam_2')->nullable();
            $table->integer('submission_4')->nullable();
            $table->integer('submission_5')->nullable();
            $table->integer('submission_6')->nullable();
            $table->integer('exam_3')->nullable();
            $table->integer('submission_7')->nullable();
            $table->integer('submission_8')->nullable();
            $table->integer('submission_9')->nullable();
            $table->integer('exam_4')->nullable();
            $table->integer('submission_10')->nullable();
            $table->integer('submission_11')->nullable();
            $table->integer('submission_12')->nullable();
            $table->integer('exam_5')->nullable();
            $table->integer('submission_13')->nullable();
            $table->integer('submission_14')->nullable();
            $table->integer('submission_15')->nullable();
            $table->integer('exam_6')->nullable();
            $table->integer('submission_16')->nullable();
            $table->integer('submission_17')->nullable();
            $table->integer('submission_18')->nullable();
            $table->integer('exam_7')->nullable();
            $table->integer('submission_19')->nullable();
            $table->integer('submission_20')->nullable();
            $table->integer('submission_21')->nullable();
            $table->integer('exam_8')->nullable();
            $table->integer('submission_22')->nullable();
            $table->integer('submission_23')->nullable();
            $table->integer('submission_24')->nullable();
            $table->integer('exam_9')->nullable();
            $table->integer('submission_25')->nullable();
            $table->integer('submission_26')->nullable();
            $table->integer('submission_27')->nullable();
            $table->integer('exam_10')->nullable();
            $table->integer('submission_28')->nullable();
            $table->integer('submission_29')->nullable();
            $table->integer('submission_30')->nullable();
            $table->integer('exam_11')->nullable();
            $table->integer('submission_31')->nullable();
            $table->integer('submission_32')->nullable();
            $table->integer('submission_33')->nullable();
            $table->integer('exam_12')->nullable();
            $table->integer('submission_34')->nullable();
            $table->integer('submission_35')->nullable();
            $table->integer('submission_36')->nullable();

            $table->unsignedBigInteger('participant_id');
            $table->foreign('participant_id')->references('id')->on('participants')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('grades');
    }
}
