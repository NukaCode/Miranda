<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToIssueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->integer('status_id')->nullable()->unsigned()->index()->after('parent_id');

            $table->foreign('status_id')
                  ->references('id')
                  ->on('issue_statuses')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issues', function (Blueprint $table) {
            $table->dropIndex('issues_status_id_index');
            $table->dropColumn('status_id');
        });
    }
}
