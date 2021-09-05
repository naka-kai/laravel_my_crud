<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content');
            $table->date('start_date');
            $table->string('start_time');
            $table->date('end_date');
            $table->string('end_time');
            $table->string('place', 100);
            $table->text('place_url')->nullable();
            $table->integer('price');
            $table->integer('parking');
            $table->string('other')->nullable();
            // $table->bigInteger('user_id')->unsigned(); //整数のみ(参照するにはuserテーブルのidと合わせてbigにしないといけない)
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('users'); //usersテーブルから自動でidを取得する
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
