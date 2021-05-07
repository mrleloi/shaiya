<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySettingHomeRequest;
use App\Http\Requests\StoreSettingHomeRequest;
use App\Http\Requests\UpdateSettingHomeRequest;
use App\Models\SettingHome;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingHomeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('setting_home_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingHomes = SettingHome::all();

        return view('admin.settingHomes.index', compact('settingHomes'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting_home_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingHomes.create');
    }

    public function store(StoreSettingHomeRequest $request)
    {
        $settingHome = SettingHome::create($request->all());

        return redirect()->route('admin.setting-homes.index');
    }

    public function edit(SettingHome $settingHome)
    {
        abort_if(Gate::denies('setting_home_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingHomes.edit', compact('settingHome'));
    }

    public function update(UpdateSettingHomeRequest $request, SettingHome $settingHome)
    {
        $settingHome->update($request->all());

        return redirect()->route('admin.setting-homes.index');
    }

    public function show(SettingHome $settingHome)
    {
        abort_if(Gate::denies('setting_home_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingHomes.show', compact('settingHome'));
    }

    public function destroy(SettingHome $settingHome)
    {
        abort_if(Gate::denies('setting_home_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingHome->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingHomeRequest $request)
    {
        SettingHome::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
