<?php

namespace App\Http\Controllers;

use App\SettingHuongDan;

class HuongDanController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingHuongDan::query()->first();
    }

    public function index()
    {
        return view('huong-dan')
            ->with([
                'settingHuongDan' => $this->setting
            ]);
    }
}
