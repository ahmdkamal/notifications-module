<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMobileNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_notifications', function (Blueprint $table) {
            $relation_user_column = config('mobileNotification.relation.column', 'user_id');
            $relation_user_table = config('mobileNotification.relation.table', 'users');
            $languages = config('mobileNotification.relation.languages', ['en', 'ar']);

            $table->bigIncrements('id');
            $table->string('topic')->default('general');
            foreach ($languages as $language) {
                $table->string("title_$language",150);
                $table->string("body_$language", 500);
            }

            $table->string('image',400)->nullable();
            $table->string('url',1000)->nullable();
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
        Schema::dropIfExists('mobile_notifications');
    }
}
