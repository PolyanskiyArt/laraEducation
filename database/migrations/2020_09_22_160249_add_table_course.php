<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableCourse extends Migration
{
    public $tableName = 'courses';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable(false)->comment('Название');
            $table->text('description')->nullable(false)->comment('Описание');
            $table->unsignedSmallInteger('price')->nullable(false)->comment('Стоимость');
            $table->unsignedSmallInteger('lesson_count')->nullable(false)->comment('количество занятий');
            $table->tinyInteger('difficult')->nullable(false)->comment('Степень сложности (от 1 до 3)');
            $table->string('image_path',250)->nullable(true)->comment('Фоновая картинка');
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
