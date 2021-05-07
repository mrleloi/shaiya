<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingGeneralsTable extends Migration
{
    public function up()
    {
        Schema::create('setting_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url_fanpage')->nullable();
            $table->string('url_group')->nullable();
            $table->longText('meta_des')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->timestamps();
        });
    }
}
