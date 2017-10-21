<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostUploadedDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_uploaded_datas', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('data_type');
//            $table->string('description');
            $table->string('post_upload')->nullable();
            $table->string('link')->nullable();
            $table->string('url')->nullable();
            $table->integer('post_id')->unsigned();
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
        Schema::dropIfExists('post_uploaded_datas');
    }
}
