<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingHuongDansTable extends Migration
{
    public function up()
    {
        Schema::create('setting_huong_dans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('header');
            $table->longText('content');
            $table->timestamps();
        });
    }
}
