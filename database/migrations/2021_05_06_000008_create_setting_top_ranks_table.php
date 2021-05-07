<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTopRanksTable extends Migration
{
    public function up()
    {
        Schema::create('setting_top_ranks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('header');
            $table->integer('num_display');
            $table->timestamps();
        });
    }
}
