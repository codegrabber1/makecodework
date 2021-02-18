<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->biginteger('blog_category_id')->unsigned();
            $table->biginteger('user_id')->unsigned();
            $table->string('bc_title', 60);
            $table->string('slug', 60)->unique();
            $table->string('bc_keyword', 255);
            $table->string('bc_description', 255);
            $table->string('bc_excerpt', 255);
            $table->text('bc_text');
            $table->string('bc_image', 100);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();


            $table->foreign('blog_category_id')->references('id')->on('blog_categories');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index( 'bc_title' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
