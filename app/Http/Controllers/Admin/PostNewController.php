<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostNewRequest;
use App\Http\Requests\StorePostNewRequest;
use App\Http\Requests\UpdatePostNewRequest;
use App\Models\PostNew;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PostNewController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('post_new_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postNews = PostNew::with(['media'])->get();

        return view('admin.postNews.index', compact('postNews'));
    }

    public function create()
    {
        abort_if(Gate::denies('post_new_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postNews.create');
    }

    public function store(StorePostNewRequest $request)
    {
        $postNew = PostNew::create($request->all());

        if ($request->input('icon_url', false)) {
            $postNew->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon_url'))))->toMediaCollection('icon_url');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $postNew->id]);
        }

        return redirect()->route('admin.post-news.index');
    }

    public function edit(PostNew $postNew)
    {
        abort_if(Gate::denies('post_new_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//        dd($postNew->title);

        return view('admin.postNews.edit', compact('postNew'));
    }

    public function update(UpdatePostNewRequest $request, PostNew $postNew)
    {
        $postNew->update($request->all());

        if ($request->input('icon_url', false)) {
            if (!$postNew->icon_url || $request->input('icon_url') !== $postNew->icon_url->file_name) {
                if ($postNew->icon_url) {
                    $postNew->icon_url->delete();
                }
                $postNew->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon_url'))))->toMediaCollection('icon_url');
            }
        } elseif ($postNew->icon_url) {
            $postNew->icon_url->delete();
        }

        return redirect()->route('admin.post-news.index');
    }

    public function show(PostNew $postNew)
    {
        abort_if(Gate::denies('post_new_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postNews.show', compact('postNew'));
    }

    public function destroy(PostNew $postNew)
    {
        abort_if(Gate::denies('post_new_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postNew->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostNewRequest $request)
    {
        PostNew::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('post_new_create') && Gate::denies('post_new_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PostNew();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
