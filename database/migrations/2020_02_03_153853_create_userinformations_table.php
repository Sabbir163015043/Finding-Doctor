<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('testingtype_id');
            $table->string('doctor_name');
            $table->string('designation');
            $table->string('hospital_name');
            $table->string('prescription_date');
            $table->string('image');
            $table->integer('status')->comment("0=Inacative 1=Active");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('testingtype_id')->references('id')->on('testingtypes')->onDelete('cascade');
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
        Schema::dropIfExists('userinformations');
    }
}
