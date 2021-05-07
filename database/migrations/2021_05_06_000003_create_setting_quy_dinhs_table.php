<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingQuyDinhsTable extends Migration
{
    public function up()
    {
        Schema::create('setting_quy_dinhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('header');
            $table->longText('content')->nullable();
            $table->timestamps();
        });
    }
}
