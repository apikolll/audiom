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
        Schema::create('appointments', function (Blueprint $table) {
            $table->string('name');
            $table->unsignedInteger('patient_id');
            $table->unsignedInteger('cabin');
            $table->string('description');
            $table->unsignedInteger('session_id');
            $table->unsignedInteger('schedule_id');
            $table->primary(['patient_id', 'cabin', 'session_id', 'schedule_id']);
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            
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
        Schema::dropIfExists('appointments');
    }
};
