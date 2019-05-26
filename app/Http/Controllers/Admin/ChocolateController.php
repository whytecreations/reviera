<?php

namespace App\Http\Controllers\Admin;

use App\Chocolate;
use App\ChocolateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChocolatesRequest;
use App\Http\Requests\Admin\UpdateChocolatesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ChocolateController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Chocolate.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('chocolate_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('chocolate_delete')) {
                return abort(401);
            }
            $chocolates = Chocolate::onlyTrashed()->get();
        } else {
            $chocolates = Chocolate::all();
        }

        return view('admin.chocolates.index', compact('chocolates'));
    }

    /**
     * Show the form for creating new Chocolate.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('chocolate_create')) {
            return abort(401);
        }
        $chocolateCategories = ChocolateCategory::all();
        return view('admin.chocolates.create',compact('chocolateCategories'));
    }

    /**
     * Store a newly created Chocolate in storage.
     *
     * @param  \App\Http\Requests\StoreChocolatesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChocolatesRequest $request)
    {
        if (! Gate::allows('chocolate_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $chocolate = Chocolate::create($request->all());


        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $chocolate->id;
            $file->save();
        }


        return redirect()->route('admin.chocolates.index');
    }


    /**
     * Show the form for editing Chocolate.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('chocolate_edit')) {
            return abort(401);
        }
        $chocolate = Chocolate::findOrFail($id);
        $chocolateCategories = ChocolateCategory::all();
        return view('admin.chocolates.edit', compact('chocolate','chocolateCategories'));
    }

    /**
     * Update Chocolate in storage.
     *
     * @param  \App\Http\Requests\UpdateChocolatesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChocolatesRequest $request, $id)
    {
        if (! Gate::allows('chocolate_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $chocolate = Chocolate::findOrFail($id);
        $chocolate->update($request->all());


        $media = [];
        foreach ($request->input('images_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $chocolate->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $chocolate->updateMedia($media, 'images');


        return redirect()->route('admin.chocolates.index');
    }


    /**
     * Display Chocolate.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('chocolate_view')) {
            return abort(401);
        }
        $chocolate = Chocolate::findOrFail($id);

        return view('admin.chocolates.show', compact('chocolate'));
    }


    /**
     * Remove Chocolate from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('chocolate_delete')) {
            return abort(401);
        }
        $chocolate = Chocolate::findOrFail($id);
        $chocolate->deletePreservingMedia();

        return redirect()->route('admin.chocolates.index');
    }

    /**
     * Delete all selected Chocolate at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('chocolate_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Chocolate::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Chocolate from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('chocolate_delete')) {
            return abort(401);
        }
        $chocolate = Chocolate::onlyTrashed()->findOrFail($id);
        $chocolate->restore();

        return redirect()->route('admin.chocolates.index');
    }

    /**
     * Permanently delete Chocolate from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('chocolate_delete')) {
            return abort(401);
        }
        $chocolate = Chocolate::onlyTrashed()->findOrFail($id);
        $chocolate->forceDelete();

        return redirect()->route('admin.chocolates.index');
    }
}
