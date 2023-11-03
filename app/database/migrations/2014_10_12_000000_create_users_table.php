<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
            // $table->timestamp('email_verified_at')->nullable();
            $table->bigIncrements('id');
            $table->string('name', 10); // ユーザー名 (最大長10のVARCHAR)
            $table->string('email', 30)->unique(); // メールアドレス (最大長30のVARCHAR、一意制約)
            $table->string('password', 100); // パスワード (最大長100のVARCHAR)
            $table->string('image', 100)->nullable(); // ユーザーアイコン (最大長100のVARCHAR、NULL許可)
            $table->string('profile', 300)->nullable(); // プロフィール (最大長300のVARCHAR、NULL許可)
            $table->string('spot', 30)->nullable(); // 留学地名称 (最大長30のVARCHAR、NULL許可)
            $table->tinyInteger('role')->default(1); // ユーザー区分 (TINYINT、デフォルト値1)
            $table->boolean('del_flg')->default(false); // ユーザー論理消去 (BOOLEAN、デフォルト値false)
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
