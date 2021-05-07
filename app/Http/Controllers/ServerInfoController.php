<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\PostEvent;
use App\PostNew;
use App\SettingServerInfo;

class ServerInfoController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingServerInfo::query()->first();
    }

    public function index()
    {
        return view('server-info')
            ->with([
                'settingServerInfo' => $this->setting
            ]);
    }
}
