<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingDownloadsTable extends Migration
{
    public function up()
    {
        Schema::create('setting_downloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('header');
            $table->longText('content')->nullable();
            $table->longText('link_gdrive')->nullable();
            $table->longText('link_mega')->nullable();
            $table->timestamps();
        });
    }
}
