<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableCourseGroup extends Migration
{
    public $tableName = 'course_groups';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->date('date_start')->nullable(false)->comment('Дата начала курса');
            $table->text('comment')->nullable(true)->comment('Комментарий (не обязательно)');

            $table->index('course_id');

//            $table->unsignedBigInteger('course_id')->nullable(false)->comment('Идентификатор курса');
//            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreignId('course_id')->constrained(); // если использовать такой синтаксис, то таблица Курсы должна называться courses
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
