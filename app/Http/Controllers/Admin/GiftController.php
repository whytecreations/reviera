<?php

namespace App\Http\Controllers\Admin;

use App\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGiftsRequest;
use App\Http\Requests\Admin\UpdateGiftsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class GiftController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Gift.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('gift_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('gift_delete')) {
                return abort(401);
            }
            $gifts = Gift::onlyTrashed()->get();
        } else {
            $gifts = Gift::all();
        }

        return view('admin.gifts.index', compact('gifts'));
    }

    /**
     * Show the form for creating new Gift.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('gift_create')) {
            return abort(401);
        }
        return view('admin.gifts.create');
    }

    /**
     * Store a newly created Gift in storage.
     *
     * @param  \App\Http\Requests\StoreGiftsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGiftsRequest $request)
    {
        if (! Gate::allows('gift_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $gift = Gift::create($request->all());


        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $gift->id;
            $file->save();
        }


        return redirect()->route('admin.gifts.index');
    }


    /**
     * Show the form for editing Gift.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('gift_edit')) {
            return abort(401);
        }
        $gift = Gift::findOrFail($id);
        return view('admin.gifts.edit', compact('gift'));
    }

    /**
     * Update Gift in storage.
     *
     * @param  \App\Http\Requests\UpdateGiftsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGiftsRequest $request, $id)
    {
        if (! Gate::allows('gift_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $gift = Gift::findOrFail($id);
        $gift->update($request->all());


        $media = [];
        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $gift->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $gift->updateMedia($media, 'images');


        return redirect()->route('admin.gifts.index');
    }


    /**
     * Display Gift.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('gift_view')) {
            return abort(401);
        }
        $gift = Gift::findOrFail($id);

        return view('admin.gifts.show', compact('gift'));
    }


    /**
     * Remove Gift from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('gift_delete')) {
            return abort(401);
        }
        $gift = Gift::findOrFail($id);
        $gift->deletePreservingMedia();

        return redirect()->route('admin.gifts.index');
    }

    /**
     * Delete all selected Gift at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('gift_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Gift::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Gift from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('gift_delete')) {
            return abort(401);
        }
        $gift = Gift::onlyTrashed()->findOrFail($id);
        $gift->restore();

        return redirect()->route('admin.gifts.index');
    }

    /**
     * Permanently delete Gift from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('gift_delete')) {
            return abort(401);
        }
        $gift = Gift::onlyTrashed()->findOrFail($id);
        $gift->forceDelete();

        return redirect()->route('admin.gifts.index');
    }
}
