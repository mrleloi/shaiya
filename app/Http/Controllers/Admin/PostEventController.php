<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostEventRequest;
use App\Http\Requests\StorePostEventRequest;
use App\Http\Requests\UpdatePostEventRequest;
use App\Models\PostEvent;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PostEventController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('post_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postEvents = PostEvent::with(['media'])->get();

        return view('admin.postEvents.index', compact('postEvents'));
    }

    public function create()
    {
        abort_if(Gate::denies('post_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postEvents.create');
    }

    public function store(StorePostEventRequest $request)
    {
        $postEvent = PostEvent::create($request->all());

        if ($request->input('icon_url', false)) {
            $postEvent->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon_url'))))->toMediaCollection('icon_url');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $postEvent->id]);
        }

        return redirect()->route('admin.post-events.index');
    }

    public function edit(PostEvent $postEvent, Request $request)
    {
        abort_if(Gate::denies('post_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postEvents.edit', compact('postEvent'));
    }

    public function update(UpdatePostEventRequest $request, PostEvent $postEvent)
    {
        $postEvent->update($request->all());

        if ($request->input('icon_url', false)) {
            if (!$postEvent->icon_url || $request->input('icon_url') !== $postEvent->icon_url->file_name) {
                if ($postEvent->icon_url) {
                    $postEvent->icon_url->delete();
                }
                $postEvent->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon_url'))))->toMediaCollection('icon_url');
            }
        } elseif ($postEvent->icon_url) {
            $postEvent->icon_url->delete();
        }

        return redirect()->route('admin.post-events.index');
    }

    public function show(PostEvent $postEvent)
    {
        abort_if(Gate::denies('post_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.postEvents.show', compact('postEvent'));
    }

    public function destroy(PostEvent $postEvent)
    {
        abort_if(Gate::denies('post_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $postEvent->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostEventRequest $request)
    {
        PostEvent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('post_event_create') && Gate::denies('post_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PostEvent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
