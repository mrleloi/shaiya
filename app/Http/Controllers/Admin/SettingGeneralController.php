<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdateSettingGeneralRequest;
use App\Models\SettingGeneral;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingGeneralController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('setting_general_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settingGenerals = SettingGeneral::with(['media'])->get();

        return view('admin.settingGenerals.index', compact('settingGenerals'));
    }

    public function edit(SettingGeneral $settingGeneral)
    {
        abort_if(Gate::denies('setting_general_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingGenerals.edit', compact('settingGeneral'));
    }

    public function update(UpdateSettingGeneralRequest $request, SettingGeneral $settingGeneral)
    {
        $settingGeneral->update($request->all());

        if ($request->input('url_ico', false)) {
            if (!$settingGeneral->url_ico || $request->input('url_ico') !== $settingGeneral->url_ico->file_name) {
                if ($settingGeneral->url_ico) {
                    $settingGeneral->url_ico->delete();
                }
                $settingGeneral->addMedia(storage_path('tmp/uploads/' . basename($request->input('url_ico'))))->toMediaCollection('url_ico');
            }
        } elseif ($settingGeneral->url_ico) {
            $settingGeneral->url_ico->delete();
        }

        if ($request->input('url_logo', false)) {
            if (!$settingGeneral->url_logo || $request->input('url_logo') !== $settingGeneral->url_logo->file_name) {
                if ($settingGeneral->url_logo) {
                    $settingGeneral->url_logo->delete();
                }
                $settingGeneral->addMedia(storage_path('tmp/uploads/' . basename($request->input('url_logo'))))->toMediaCollection('url_logo');
            }
        } elseif ($settingGeneral->url_logo) {
            $settingGeneral->url_logo->delete();
        }

        if ($request->input('url_background', false)) {
            if (!$settingGeneral->url_background || $request->input('url_background') !== $settingGeneral->url_background->file_name) {
                if ($settingGeneral->url_background) {
                    $settingGeneral->url_background->delete();
                }
                $settingGeneral->addMedia(storage_path('tmp/uploads/' . basename($request->input('url_background'))))->toMediaCollection('url_background');
            }
        } elseif ($settingGeneral->url_background) {
            $settingGeneral->url_background->delete();
        }

        return redirect()->route('admin.setting-generals.index');
    }

    public function show(SettingGeneral $settingGeneral)
    {
        abort_if(Gate::denies('setting_general_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settingGenerals.show', compact('settingGeneral'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_general_create') && Gate::denies('setting_general_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SettingGeneral();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
