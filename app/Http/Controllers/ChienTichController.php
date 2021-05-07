<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\PostNew;
use App\SettingChienTich;
use Illuminate\Http\Request;

class ChienTichController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingChienTich::query()->first();
    }

    public function index(Request $request)
    {
        $pvp = 4;
        $lv_from = 1;
        $lv_to = 60;
        if ($request->has('pvp') && in_array(intval($request->pvp), [1,2,3,4])) $pvp = intval($request->pvp);
        switch ($pvp) {
            case 1: $lv_from = 1; $lv_to = 15; break;
            case 2: $lv_from = 16; $lv_to = 30; break;
            case 3: $lv_from = 31; $lv_to = 60; break;
        }
        if ($this->setting->num_display) {
            $list = PostNew::query()
                ->whereBetween('status', [$lv_from, $lv_to])
                ->orderBy('created_at', 'desc')
                ->paginate($this->setting->num_display);
        } else {
            $list = collect();
        }
        return view('chien-tich')
            ->with([
                'settingChienTich' => $this->setting,
                'list' => $list
            ]);
    }
}
