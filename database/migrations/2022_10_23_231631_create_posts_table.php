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
            $table->id()->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('file_path');
            $table->datetime('published_at')->nullable();
            $table->timestamps();
        });
    }



}
