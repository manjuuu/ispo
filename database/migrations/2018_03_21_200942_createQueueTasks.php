<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->string('title');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        Schema::create('user_queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('queue_id');
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('queue_id');
            if ((DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') && version_compare(DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), '5.7.8', 'ge')) {
                $table->json('task_details');
            } else {
                $table->text('task_details');
            }
            $table->timestamps();
        });
        Schema::create('queue_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('queue_id');
            $table->string('title');
            $table->integer('question_type_id');
            $table->integer('option_group_id');
            $table->timestamps();
        });
        Schema::create('task_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('task_id');
            if ((DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') && version_compare(DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), '5.7.8', 'ge')) {
                $table->json('response_attributes');
            } else {
                $table->text('response_attributes');
            }
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queues');
        Schema::dropIfExists('user_queues');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('queue_questions');
        Schema::dropIfExists('task_responses');
    }
}
