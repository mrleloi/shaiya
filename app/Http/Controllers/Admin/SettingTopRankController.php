<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingTopRankRequest;
use App\Models\SettingTopRank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingTopRankController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setting_top_rank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingTopRanks = SettingTopRank::all();

        return view('admin.settingTopRanks.index', compact('settingTopRanks'));
    }

    public function edit(SettingTopRank $settingTopRank)
    {
        abort_if(Gate::denies('setting_top_rank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingTopRanks.edit', compact('settingTopRank'));
    }

    public function update(UpdateSettingTopRankRequest $request, SettingTopRank $settingTopRank)
    {
        $settingTopRank->update($request->all());

        return redirect()->route('admin.setting-top-ranks.index');
    }

    public function show(SettingTopRank $settingTopRank)
    {
        abort_if(Gate::denies('setting_top_rank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingTopRanks.show', compact('settingTopRank'));
    }
}
