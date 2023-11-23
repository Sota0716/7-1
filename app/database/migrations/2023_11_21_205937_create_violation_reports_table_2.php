<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationReportsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('violation_reports', function (Blueprint $table) {
            $table->dropForeign(['post_id']); // 既存の外部キー制約を削除
    
            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade'); // 投稿が削除された際に関連データも削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
