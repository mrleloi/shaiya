<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSettingQuyDinhRequest;
use App\Models\SettingQuyDinh;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingQuyDinhController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_quy_dinh_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingQuyDinhs = SettingQuyDinh::all();

        return view('admin.settingQuyDinhs.index', compact('settingQuyDinhs'));
    }

    public function edit(SettingQuyDinh $settingQuyDinh)
    {
        abort_if(Gate::denies('setting_quy_dinh_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingQuyDinhs.edit', compact('settingQuyDinh'));
    }

    public function update(UpdateSettingQuyDinhRequest $request, SettingQuyDinh $settingQuyDinh)
    {
        $settingQuyDinh->update($request->all());

        return redirect()->route('admin.setting-quy-dinhs.index');
    }

    public function show(SettingQuyDinh $settingQuyDinh)
    {
        abort_if(Gate::denies('setting_quy_dinh_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingQuyDinhs.show', compact('settingQuyDinh'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_quy_dinh_create') && Gate::denies('setting_quy_dinh_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SettingQuyDinh();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
