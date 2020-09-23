<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableLesson extends Migration
{
    public $tableName = 'lessons';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->comment('Идентификатор курса')->constrained();
            $table->string('name', 150)->nullable(false)->comment('Идентификатор курса');
            $table->text('description')->nullable(true)->comment('Текстовое описание урока');
            $table->unsignedSmallInteger('duration_minutes')->nullable(false)->comment('Продолжительность урока в минутах');
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
