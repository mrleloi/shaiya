<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\PostNew;
use App\SettingTopRank;
use Illuminate\Http\Request;

class TopRankController extends Controller
{
    public function __construct()
    {
        $this->setting = SettingTopRank::query()->first();
    }

    public function index(Request $request)
    {
        $lm = 1;
        $type = 1;
        if ($request->has('lm') && in_array(intval($request->lm), [1,2])) $lm = intval($request->lm);
        switch ($type) {
            case 1: $type = 1; break;
            case 2: $type = 2; break;
        }
        $list = PostNew::query()
            ->where('status', '=', $type)
            ->orderBy('created_at', 'desc')
            ->paginate($this->setting->num_display);
        return view('top-rank')
            ->with([
                'settingTopRank' => $this->setting,
                'list' => $list
            ]);
    }
}
