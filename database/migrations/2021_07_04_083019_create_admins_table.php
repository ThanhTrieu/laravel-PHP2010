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
            $table->increments('id'); // UNSIGNED integer + unique + primary key
            // them truong vao bang
            $table->string('username',30)->unique();
            $table->string('password',60);
            $table->tinyInteger('role')->default(1);
            $table->string('email',60)->unique();
            $table->string('fullname',60);
            $table->string('phone',20);
            $table->string('address', 255);
            $table->date('birthday');
            $table->string('avatar',100)->nullable(); // ko can nhap du lieu
            $table->tinyInteger('status')->default(1); // gia tri mac dinh
            $table->tinyInteger('gender')->default(1);
            $table->timestamps(); // 2 truong created va updated
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
