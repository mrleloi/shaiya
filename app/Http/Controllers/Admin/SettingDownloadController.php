<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSettingDownloadRequest;
use App\Models\SettingDownload;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingDownloadController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_download_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingDownloads = SettingDownload::all();

        return view('admin.settingDownloads.index', compact('settingDownloads'));
    }

    public function edit(SettingDownload $settingDownload)
    {
        abort_if(Gate::denies('setting_download_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingDownloads.edit', compact('settingDownload'));
    }

    public function update(UpdateSettingDownloadRequest $request, SettingDownload $settingDownload)
    {
        $settingDownload->update($request->all());

        return redirect()->route('admin.setting-downloads.index');
    }

    public function show(SettingDownload $settingDownload)
    {
        abort_if(Gate::denies('setting_download_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingDownloads.show', compact('settingDownload'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_download_create') && Gate::denies('setting_download_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SettingDownload();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
