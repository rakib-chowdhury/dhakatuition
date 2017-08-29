<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoringExperenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoring_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tutoring_basic_info_id');
            $table->integer('experience_years', false, true)->length(2);
            $table->string('discription');
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
        Schema::dropIfExists('tutoring_experience');
    }
}
