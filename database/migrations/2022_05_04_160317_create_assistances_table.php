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
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->string('datetime');
            $table->string('status');
            $table->unsignedBigInteger('activitie_id');
            $table->unsignedBigInteger('associate_id');
            $table->foreign('activitie_id')->references('id')->on('activities')->onDelete('cascade');
            $table->foreign('associate_id')->references('id')->on('associates')->onDelete('cascade');

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
        Schema::dropIfExists('assistances');
    }
};
