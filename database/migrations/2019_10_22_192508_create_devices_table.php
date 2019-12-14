<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $relation_user_column = config('mobileNotification.relation.column', 'user_id');
            $relation_user_table = config('mobileNotification.relation.table', 'users');

            $table->bigIncrements('id');
            $table->string('device_token',300)->nullable();
            $table->string('device_id',300)->nullable();
            $table->string('device_type')->default('android');
            $table->unsignedInteger($relation_user_column);
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
        Schema::dropIfExists('devices');
    }
}
