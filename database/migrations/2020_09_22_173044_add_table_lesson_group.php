<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableLessonGroup extends Migration
{
    public $tableName = 'lesson_group';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_group_id')->constrained(); // если использовать такой синтаксис, то таблица Курсы должна называться groups
            $table->foreignId('lesson_id')->constrained(); // если использовать такой синтаксис, то таблица Курсы должна называться lessons
            $table->dateTime('time_start')->nullable(false)->comment('Время начала урока');
            $table->unsignedBigInteger('teacher_id')->nullable(false)->comment('Идентификатор учителя');
            $table->foreign('teacher_id')->references('id')->on('users'); // используем этот синтаксис, т.к. имя таблицы не teachers

//	`teacher_id` INT(10,0) NOT NULL COMMENT 'Идентификатор учителя',



//            $table->foreignId('course_id')->constrained(); // если использовать такой синтаксис, то таблица Курсы должна называться courses
//            $table->string('name', 150)->nullable(false)->comment('Идентификатор курса');
//            $table->text('description')->nullable(true)->comment('Текстовое описание урока');
//            $table->unsignedSmallInteger('duration_minutes')->nullable(false)->comment('Продолжительность урока в минутах');

//            CREATE TABLE `lesson_group` (
//            `id` INT(10,0) NOT NULL AUTO_INCREMENT,
//	`group_id` INT(10,0) NOT NULL COMMENT 'Идентификатор группы',
//	`lesson_id` INT(10,0) NOT NULL COMMENT 'Идентификатор урока',
//	`time_start` DATETIME NOT NULL COMMENT 'Время начала урока',
//	`teacher_id` INT(10,0) NOT NULL COMMENT 'Идентификатор учителя',
//	PRIMARY KEY (`id`) USING BTREE,
//	INDEX `teacher_id` (`teacher_id`) USING BTREE,
//	INDEX `group_id` (`group_id`) USING BTREE,
//	INDEX `lesson_id` (`lesson_id`) USING BTREE,
//	CONSTRAINT `lesson_group_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `yii2_starter`.`user` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
//	CONSTRAINT `lesson_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `yii2_starter`.`course_group` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION,
//	CONSTRAINT `lesson_group_ibfk_3` FOREIGN KEY (`lesson_id`) REFERENCES `yii2_starter`.`lesson` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
//)
//COLLATE='utf8_general_ci'
//ENGINE=InnoDB
//;



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
