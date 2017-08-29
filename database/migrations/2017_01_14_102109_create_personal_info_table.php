<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('gender',5);
            $table->string('marital_status',20);
            $table->string('country',50);
            $table->string('division',50);
            $table->string('district',50);
            $table->string('upazila',50);
            $table->string('location',200);
            $table->string('zip_code',20);
            $table->integer('id_card_type', false, true)->length(2);
            $table->string('id_card_number',100);
            $table->string('fb_link',150)->nullable();
            $table->string('linkdin_link',150)->nullable();
            $table->string('father_name',100);
            $table->string('father_phone',20)->nullable();
            $table->string('mother_name',100);
            $table->string('mother_phone',20)->nullable();
            $table->string('emergency_contact_name',100);
            $table->string('emergency_contact_relation',50);
            $table->string('emergency_contact_phone',30);
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
        Schema::dropIfExists('personal_info');
    }
}
