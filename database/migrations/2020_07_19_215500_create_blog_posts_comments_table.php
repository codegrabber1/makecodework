<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts_comments', function (Blueprint $table) {
            $table->id();
            $table->biginteger('blog_post_id')->unsigned();
            $table->string('author_name', 60);
            $table->string('author_email', 100)->unique();
            $table->text('comment_text');
            $table->boolean('moderated')->default(false);

	        $table->timestamp('published_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('blog_post_id')->references('id')->on('blog_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts_comments');
    }
}
