<?php

namespace App\Http\Controllers\Admin;

use App\Flower;
use App\FlowerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFlowersRequest;
use App\Http\Requests\Admin\UpdateFlowersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class FlowerController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Flower.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('flower_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('flower_delete')) {
                return abort(401);
            }
            $flowers = Flower::onlyTrashed()->get();
        } else {
            $flowers = Flower::all();
        }

        return view('admin.flowers.index', compact('flowers'));
    }

    /**
     * Show the form for creating new Flower.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('flower_create')) {
            return abort(401);
        }
        $flowerCategories = FlowerCategory::all();
        return view('admin.flowers.create',compact('flowerCategories'));
    }

    /**
     * Store a newly created Flower in storage.
     *
     * @param  \App\Http\Requests\StoreFlowersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlowersRequest $request)
    {
        if (! Gate::allows('flower_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $flower = Flower::create($request->all());


        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $flower->id;
            $file->save();
        }


        return redirect()->route('admin.flowers.index');
    }


    /**
     * Show the form for editing Flower.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('flower_edit')) {
            return abort(401);
        }
        $flower = Flower::findOrFail($id);
        $flowerCategories = FlowerCategory::all();
        return view('admin.flowers.edit', compact('flower','flowerCategories'));
    }

    /**
     * Update Flower in storage.
     *
     * @param  \App\Http\Requests\UpdateFlowersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFlowersRequest $request, $id)
    {
        if (! Gate::allows('flower_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $flower = Flower::findOrFail($id);
        $flower->update($request->all());


        $media = [];
        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $flower->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $flower->updateMedia($media, 'images');


        return redirect()->route('admin.flowers.index');
    }


    /**
     * Display Flower.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('flower_view')) {
            return abort(401);
        }
        $flower = Flower::findOrFail($id);

        return view('admin.flowers.show', compact('flower'));
    }


    /**
     * Remove Flower from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('flower_delete')) {
            return abort(401);
        }
        $flower = Flower::findOrFail($id);
        $flower->deletePreservingMedia();

        return redirect()->route('admin.flowers.index');
    }

    /**
     * Delete all selected Flower at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('flower_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Flower::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Flower from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('flower_delete')) {
            return abort(401);
        }
        $flower = Flower::onlyTrashed()->findOrFail($id);
        $flower->restore();

        return redirect()->route('admin.flowers.index');
    }

    /**
     * Permanently delete Flower from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('flower_delete')) {
            return abort(401);
        }
        $flower = Flower::onlyTrashed()->findOrFail($id);
        $flower->forceDelete();

        return redirect()->route('admin.flowers.index');
    }
}
