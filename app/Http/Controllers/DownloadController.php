<?php

namespace App\Http\Controllers;

use App\SettingDownload;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingDownload::query()->first();
    }

    public function index()
    {
        return view('download')
            ->with([
                'settingDownload' => $this->setting
            ]);
    }
}
