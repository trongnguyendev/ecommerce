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
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->text('description');
            $table->text('quote');
            $table->string('photo');
            $table->unsignedBigInteger('post_cate_id')->nullable();
            $table->unsignedBigInteger('post_tag_id')->nullable();
            $table->unsignedBigInteger('added_by')->nullable();
            $table->boolean('status')->default(true);
            $table->foreign('post_cate_id')->references('id')->on('post_categories')->onDelete('SET NULL');
            $table->foreign('post_tag_id')->references('id')->on('post_tags')->onDelete('SET NULL');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL');
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
        Schema::dropIfExists('posts');
    }
}
