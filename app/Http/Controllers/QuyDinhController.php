<?php

namespace App\Http\Controllers;

use App\SettingQuyDinh;

class QuyDinhController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingQuyDinh::query()->first();
    }

    public function index()
    {
        return view('quy-dinh')
            ->with([
                'settingQuyDinh' => $this->setting
            ]);
    }
}
