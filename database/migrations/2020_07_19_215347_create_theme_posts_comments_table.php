<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemePostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_posts_comments', function (Blueprint $table) {
            $table->id();
            $table->biginteger('theme_post_id')->unsigned();
            $table->biginteger('user_id')->unsigned()->nullable();
            $table->biginteger('parent_id')->unsigned();
            $table->string('author_name', 60);
            $table->string('author_email', 100)->unique();
            $table->text('comment_text');
            $table->boolean('moderated')->default(false);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('theme_post_id')->references('id')->on('theme_posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

//     comment_text text,
//     moderated varchar (255) not null,
//     published_at tinyint default 0,
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_posts_comments');
    }
}
