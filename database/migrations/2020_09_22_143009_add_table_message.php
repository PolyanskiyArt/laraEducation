<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableMessage extends Migration
{
    public $tableName = 'personal_message';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id')->nullable(false)->comment('Отправитель сообщения');
            $table->foreign('from_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('to_user_id')->nullable(false)->comment('Получатель сообщения');
            $table->foreign('to_user_id')->references('id')->on('users');
            $table->text('text')->nullable(false)->comment('Текст сообщения');
            $table->boolean('is_new')->nullable(false)->default(true)->comment('true, если сообщение не прочитано получателем');
            $table->unsignedSmallInteger('important_state')->default(1)->comment('важность от 1 до 3');
            $table->dateTime('created_at', 0)->nullable(false)->comment('Время создания сообщения');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
