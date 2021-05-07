<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSettingServerInfoRequest;
use App\Models\SettingServerInfo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingServerInfoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_server_info_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingServerInfos = SettingServerInfo::all();

        return view('admin.settingServerInfos.index', compact('settingServerInfos'));
    }

    public function edit(SettingServerInfo $settingServerInfo)
    {
        abort_if(Gate::denies('setting_server_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingServerInfos.edit', compact('settingServerInfo'));
    }

    public function update(UpdateSettingServerInfoRequest $request, SettingServerInfo $settingServerInfo)
    {
        $settingServerInfo->update($request->all());

        return redirect()->route('admin.setting-server-infos.index');
    }

    public function show(SettingServerInfo $settingServerInfo)
    {
        abort_if(Gate::denies('setting_server_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingServerInfos.show', compact('settingServerInfo'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_server_info_create') && Gate::denies('setting_server_info_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SettingServerInfo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
