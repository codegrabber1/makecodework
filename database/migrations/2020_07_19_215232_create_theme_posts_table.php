<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_posts', function (Blueprint $table) {
            $table->id();
            $table->biginteger('theme_category_id')->unsigned();
            $table->biginteger('user_id')->unsigned();
            $table->string('p_title', 100);
            $table->string('p_slug', 100)->unique();
            $table->string('p_keywords', 255);
            $table->string('p_description', 255);
            $table->string('p_excerpt', 255);
            $table->text('p_text');
            $table->string('p_image', 100);
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('theme_category_id')->references('id')->on('theme_categories');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index('p_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_posts');
    }
}
