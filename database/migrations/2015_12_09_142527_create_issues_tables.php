<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
            $table->integer('created_by')->nullable()->unsigned()->index();
            $table->integer('assigned_to')->nullable()->unsigned()->index();
            $table->string('name');
            $table->string('key')->unique();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('issues')
                  ->onDelete('set null');

            $table->foreign('project_id')
                  ->references('id')
                  ->on('projects')
                  ->onDelete('cascade');

            $table->foreign('created_by')
                  ->references('id')
                  ->on('users');

            $table->foreign('assigned_to')
                  ->references('id')
                  ->on('users');
        });

        Schema::create('issue_user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('key_name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('issue_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('issue_id')->unsigned();
            $table->integer('issue_user_type_id')->unsigned();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('issue_id')
                  ->references('id')
                  ->on('issues')
                  ->onDelete('cascade');

            $table->foreign('issue_user_type_id')
                  ->references('id')
                  ->on('issue_user_types');

            $table->primary(['user_id', 'issue_id']);
        });

        Schema::create('issue_votes', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('issue_id')->unsigned();
            $table->integer('vote')->index();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('issue_id')
                  ->references('id')
                  ->on('issues')
                  ->onDelete('cascade');

            $table->primary(['user_id', 'issue_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issue_votes');
        Schema::drop('issue_users');
        Schema::drop('issue_user_types');
        Schema::drop('issues');
    }
}
