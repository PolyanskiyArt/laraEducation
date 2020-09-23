<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableStudentProgress extends Migration
{
    public $tableName = 'student_progress';

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

            $table->foreignId('lesson_group_id')->comment('Идентификатор пройденного урока')->constrained();
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
