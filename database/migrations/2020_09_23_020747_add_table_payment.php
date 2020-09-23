<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTablePayment extends Migration
{
    public $tableName = 'payment';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable(false)->comment('Идентификатор пользователя (студента)');
            $table->foreign('student_id')->references('id')->on('users');

            $table->dateTime('payed_at')->nullable(true)->comment('Время платежа');
            $table->unsignedSmallInteger('sum')->nullable(true)->comment('Сумма платежа');

            $table->foreignId('course_group_id')->comment('Идентификатор группы в которую он вступает')->constrained();

            $table->dateTime('approved_at')->nullable(true)->comment('Время подтверждения платежа');
            $table->unsignedBigInteger('approved_by')->nullable(true)->comment('Идентификатор пользователя, подтвердившего платеж');
            $table->foreign('approved_by')->references('id')->on('users');

            $table->string('filename', 250)->nullable('false')->comment('Скриншот квитанции об оплате');
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
