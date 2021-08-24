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
            $table->string('type');
            $table->string('industry');
            $table->string('location');
            $table->text('specification');
            $table->integer('salary');
            $table->string('benefit');
            $table->text('job_scope');
            $table->integer('position');
            $table->string('deadline');
            $table->string('status')->default('Available');
            $table->foreignId('employer_id')->constrained()->onDelete('cascade');
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
