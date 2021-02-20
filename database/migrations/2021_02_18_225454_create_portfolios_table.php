<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
	        $table->id();
	        $table->biginteger('portfolio_category_id')->unsigned();
	        $table->biginteger('user_id')->unsigned();
	        $table->string('title', 60);
	        $table->string('slug', 60)->unique();
	        $table->string('img', 100);
	        $table->string('keyword', 255);
	        $table->string('description', 255);
	        $table->string('title_task',255);
	        $table->string('task_description',255);
	        $table->string('site_link',255);

	        $table->boolean('is_published')->default(false);
	        $table->timestamp('published_at')->nullable();

	        $table->timestamps();
	        $table->softDeletes();

	        $table->foreign('portfolio_category_id')->references('id')->on('portfolio_categories');
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->index( 'title' );


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
