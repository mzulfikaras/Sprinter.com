<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_blogs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tags_id')->unsigned()->index();
            $table->bigInteger('blog_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_blogs');
    }
}
