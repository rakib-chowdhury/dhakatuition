<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('phone',20);
            $table->string('relation',50);
            $table->string('email',100);
            $table->integer('student_amount')->length(2);
            $table->string('gender',5);
            $table->string('salary',20);
            $table->boolean('negotiable')->default(false);
            $table->integer('day_week')->length(2);
            $table->string('country',20);
            $table->string('division',20);
            $table->string('district',20);
            $table->string('location',50);
            $table->string('specified_location');
            $table->text('requirement');
            $table->integer('status')->length(2)->default(0);
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
        Schema::dropIfExists('offers');
    }
}
