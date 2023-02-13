<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelance_contract_freelancers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('freelance_contract_id');
            $table->unsignedBigInteger('freelancer_id');
            $table->integer('order');
            $table->integer('fees');
            $table->foreign('freelance_contract_id')->references('id')->on('freelance_contracts');
            $table->foreign('freelancer_id')->references('id')->on('freelancers');
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
        Schema::dropIfExists('contract_freelancers');
    }
}
