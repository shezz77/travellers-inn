<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id')->unsigned();
            $table->string('post_title');
            $table->text('post_description');
            $table->string('ebook_title')->nullable();
            $table->string('ebook_link')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->dateTime('starting_time')->nullable();
            $table->dateTime('ending_time')->nullable();
            $table->boolean('is_rejected')->default(0);
            $table->boolean('status')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('contant_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('state_id')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
