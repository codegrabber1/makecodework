<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('user_id');
            $table->string('slug', 100)->unique();
            $table->string('th_cat_name', 60);
            $table->string('th_cat_img', 60);
	        $table->boolean('is_published')->default(false);
	        $table->timestamp('published_at')->nullable();
	        
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theme_categories');
    }
}
