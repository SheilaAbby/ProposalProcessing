<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStage2ProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage2_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('organization:name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('submitted_by:name');
            $table->text('summary');
            $table->text('background');
            $table->text('activities');
            $table->text('budget');
            $table->boolean('status');
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
        Schema::dropIfExists('stage2_proposals');
    }
}
