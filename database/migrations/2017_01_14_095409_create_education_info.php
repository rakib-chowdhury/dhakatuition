<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('exam_title',150);
            $table->string('label',100);
            $table->string('major',100);
            $table->string('curriculum',100);
            $table->string('institute',150);
            $table->string('id_card',100)->nullable();
            $table->integer('cGpa');
            $table->string('from',100);
            $table->string('until',100);
            $table->string('passed',100);
            $table->boolean('currently_studding')->default(false);
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
        Schema::dropIfExists('education_info');
    }
}
