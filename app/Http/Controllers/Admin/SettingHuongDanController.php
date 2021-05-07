<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSettingHuongDanRequest;
use App\Models\SettingHuongDan;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingHuongDanController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_huong_dan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingHuongDans = SettingHuongDan::all();

        return view('admin.settingHuongDans.index', compact('settingHuongDans'));
    }

    public function edit(SettingHuongDan $settingHuongDan)
    {
        abort_if(Gate::denies('setting_huong_dan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingHuongDans.edit', compact('settingHuongDan'));
    }

    public function update(UpdateSettingHuongDanRequest $request, SettingHuongDan $settingHuongDan)
    {
        $settingHuongDan->update($request->all());

        return redirect()->route('admin.setting-huong-dans.index');
    }

    public function show(SettingHuongDan $settingHuongDan)
    {
        abort_if(Gate::denies('setting_huong_dan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingHuongDans.show', compact('settingHuongDan'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_huong_dan_create') && Gate::denies('setting_huong_dan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SettingHuongDan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
