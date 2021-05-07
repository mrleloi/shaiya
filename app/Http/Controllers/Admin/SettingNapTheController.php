<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSettingNapTheRequest;
use App\Models\SettingNapThe;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingNapTheController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_nap_the_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingNapThes = SettingNapThe::all();

        return view('admin.settingNapThes.index', compact('settingNapThes'));
    }

    public function edit(SettingNapThe $settingNapThe)
    {
        abort_if(Gate::denies('setting_nap_the_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingNapThes.edit', compact('settingNapThe'));
    }

    public function update(UpdateSettingNapTheRequest $request, SettingNapThe $settingNapThe)
    {
        $settingNapThe->update($request->all());

        return redirect()->route('admin.setting-nap-thes.index');
    }

    public function show(SettingNapThe $settingNapThe)
    {
        abort_if(Gate::denies('setting_nap_the_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingNapThes.show', compact('settingNapThe'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_nap_the_create') && Gate::denies('setting_nap_the_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SettingNapThe();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
