<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableTeacherProfile extends Migration
{
    public $tableName = 'teacher_profile';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable(false)->comment('Описание опыта');
            $table->foreignId('user_id')->comment('Идентификатор пользователя')->constrained(); // Идентификатор пользователя
        });

        //
//        CREATE TABLE `teacher_profile` (
//    `id` INT(10,0) NOT NULL AUTO_INCREMENT,
//	`description` TEXT(65535) NOT NULL COMMENT 'Описание опыта' COLLATE 'utf8_general_ci',
//	`user_id` INT(10,0) NOT NULL COMMENT 'Ссылка на пользователя',
//	PRIMARY KEY (`id`) USING BTREE,
//	INDEX `user_id` (`user_id`) USING BTREE,
//	CONSTRAINT `teacher_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `yii2_starter`.`user` (`id`) ON UPDATE NO ACTION ON DELETE NO ACTION
//)
//COLLATE='utf8_general_ci'
//ENGINE=InnoDB
//AUTO_INCREMENT=7
//;
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
