<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingChienTichRequest;
use App\Models\SettingChienTich;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingChienTichController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setting_chien_tich_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingChienTiches = SettingChienTich::all();

        return view('admin.settingChienTiches.index', compact('settingChienTiches'));
    }

    public function edit(SettingChienTich $settingChienTich)
    {
        abort_if(Gate::denies('setting_chien_tich_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingChienTiches.edit', compact('settingChienTich'));
    }

    public function update(UpdateSettingChienTichRequest $request, SettingChienTich $settingChienTich)
    {
        $settingChienTich->update($request->all());

        return redirect()->route('admin.setting-chien-tiches.index');
    }

    public function show(SettingChienTich $settingChienTich)
    {
        abort_if(Gate::denies('setting_chien_tich_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingChienTiches.show', compact('settingChienTich'));
    }
}
