<?php

namespace App\Http\Controllers;

use App\SettingNapThe;
use Illuminate\Http\Request;

class NapTheController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingNapThe::query()->first();
    }

    public function index()
    {
        return view('nap-the')
            ->with([
                'settingNapThe' => $this->setting
            ]);
    }
}
