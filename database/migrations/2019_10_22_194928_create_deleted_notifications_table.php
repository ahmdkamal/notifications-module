<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeletedNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_notifications', function (Blueprint $table) {
            $relation_user_column = config('mobileNotification.relation.column', 'user_id');
            $relation_user_table = config('mobileNotification.relation.table', 'users');

            $table->bigIncrements('id');
            $table->unsignedBigInteger('notification_id')->nullable();
            $table->foreign('notification_id')->references('id')->on('mobile_notifications')->onDelete('cascade');
            $table->unsignedInteger($relation_user_column)->nullable();
            $table->foreign($relation_user_column)->references('id')->on($relation_user_table)->onDelete('cascade');
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
        Schema::dropIfExists('deleted_notifications');
    }
}
