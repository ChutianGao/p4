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
            $table->increments('id');
            $table->timestamps();

            # The rest of the fields...
            $table->integer('user_id');
            $table->string('title');
            $table->text('body');
            //$table->string('post_type');
            $table->string('city');
            $table->string('state');
            $table->date('movein_date');
            $table->string('term');
            $table->dateTime('published_at');
            $table->string('status');
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
