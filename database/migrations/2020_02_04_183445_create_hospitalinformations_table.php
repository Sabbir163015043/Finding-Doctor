<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalinformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('doctortype_id')->nullable();
            $table->string('category');
            $table->string('doctor_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('image')->nullable();
            $table->string('hospital_name')->nullable();
            $table->string('doctor_details')->nullable();
            $table->string('hospital_details')->nullable();
            $table->integer('status')->comment("0=Inacative 1=Active");
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('doctortype_id')->references('id')->on('doctortypes')->onDelete('cascade');
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
        Schema::dropIfExists('hospitalinformations');
    }
}
