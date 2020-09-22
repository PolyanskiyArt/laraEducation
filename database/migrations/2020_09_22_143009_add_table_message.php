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
            $table->bigInteger('from_user_id')->nullable(false);
            $table->bigInteger('to_user_id')->nullable(false);
            $table->text('text')->nullable(false);
            $table->boolean('is_new')->nullable(false)->default(true);
            $table->unsignedSmallInteger('important_state')->default(1);
            $table->dateTime('created_at', 0)->nullable(false);
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
