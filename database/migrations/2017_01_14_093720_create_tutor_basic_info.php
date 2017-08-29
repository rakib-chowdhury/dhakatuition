<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorBasicInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoring_basic_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('tutoring_contact_no',20);
            $table->boolean('student_home')->default(false);
            $table->boolean('tutor_home')->default(false);
            $table->boolean('online_home')->default(false);
            $table->boolean('experience');
            $table->string('available_from',50);
            $table->string('available_to',50);
            $table->string('salary',100);
            $table->string('country',100);
            $table->integer('division');
            $table->integer('district');
            $table->integer('location');
            $table->boolean('salary_negotiable')->default(false);
            $table->boolean('personal_tutoring')->default(false);
            $table->boolean('group_tutoring')->default(false);
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
        Schema::dropIfExists('basic_info');
    }
}
