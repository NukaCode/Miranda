<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAndCommentsToIssues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('key_name')->index();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('issue_comment_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('key_name')->index();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('issue_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('issue_id')->unsigned();
            $table->integer('type_id')->unsigned()->integer();
            $table->text('body');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('issue_id')
                  ->references('id')
                  ->on('issues')
                  ->onDelete('cascade');

            $table->foreign('type_id')
                  ->references('id')
                  ->on('issue_comment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issue_comments');
        Schema::drop('issue_statuses');
    }
}
