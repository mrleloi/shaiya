<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingHomesTable extends Migration
{
    public function up()
    {
        Schema::create('setting_homes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->integer('num_news_display');
            $table->integer('num_events_display');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
