<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('worker_id');
            $table->integer('client_id');
            $table->integer('status_id');
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->date('time_end')->default('01-01-0001');
            $table->string('image_before')->default('');
            $table->string('image_after')->default('');
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
        Schema::dropIfExists('jobs');
    }
}
