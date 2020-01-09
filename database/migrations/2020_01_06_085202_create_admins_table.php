<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adminName',100);
            $table->string('password',100);
            $table->string('fullname',100);
            $table->string('email',100)->unique();
            $table->string('mobile',20);
            $table->string('workplace',100);
            $table->integer('level_id')->unsigned()->index();
            // //  $table->foreign('level_id')->references('id')->on('levels');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
