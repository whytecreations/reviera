<?php

namespace App\Http\Controllers\Admin;

use App\FlowerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFlowerCategoriesRequest;
use App\Http\Requests\Admin\UpdateFlowerCategoriesRequest;

class FlowerCategoryController extends Controller
{

    /**
     * Display a listing of FlowerCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('flower_category_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('flower_category_delete')) {
                return abort(401);
            }
            $flowerCategories = FlowerCategory::onlyTrashed()->get();
        } else {
            $flowerCategories = FlowerCategory::all();
        }

        return view('admin.flowercategories.index', compact('flowerCategories'));
    }

    /**
     * Show the form for creating new FlowerCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('flower_category_create')) {
            return abort(401);
        }
        return view('admin.flowercategories.create');
    }

    /**
     * Store a newly created FlowerCategory in storage.
     *
     * @param  \App\Http\Requests\StoreFlowerCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlowerCategoriesRequest $request)
    {
        if (! Gate::allows('flower_category_create')) {
            return abort(401);
        }
        $request['slug'] = str_slug($request->name);
        $flowerCategory = FlowerCategory::create($request->all());


        return redirect()->route('admin.flowercategories.index');
    }


    /**
     * Show the form for editing FlowerCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('flower_category_edit')) {
            return abort(401);
        }
        $flowerCategory = FlowerCategory::findOrFail($id);

        return view('admin.flowercategories.edit', compact('flowerCategory'));
    }

    /**
     * Update FlowerCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateFlowerCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFlowerCategoriesRequest $request, $id)
    {
        if (! Gate::allows('flower_category_edit')) {
            return abort(401);
        }
        
        $flowerCategory = FlowerCategory::findOrFail($id);
        $request['slug'] = str_slug($request->name);
        $flowerCategory->update($request->all());

        return redirect()->route('admin.flowercategories.index');
    }


    /**
     * Display FlowerCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('flower_category_view')) {
            return abort(401);
        }
        $flowerCategory = FlowerCategory::findOrFail($id);

        return view('admin.flowercategories.show', compact('flowerCategory'));
    }


    /**
     * Remove FlowerCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('flower_category_delete')) {
            return abort(401);
        }
        $flowerCategory = FlowerCategory::findOrFail($id);
        $flowerCategory->delete();

        return redirect()->route('admin.flowercategories.index');
    }

    /**
     * Delete all selected FlowerCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('flower_category_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = FlowerCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore FlowerCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('flower_category_delete')) {
            return abort(401);
        }
        $flowerCategory = FlowerCategory::onlyTrashed()->findOrFail($id);
        $flowerCategory->restore();

        return redirect()->route('admin.flowercategories.index');
    }

    /**
     * Permanently delete FlowerCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('flower_category_delete')) {
            return abort(401);
        }
        $flowerCategory = FlowerCategory::onlyTrashed()->findOrFail($id);
        $flowerCategory->forceDelete();

        return redirect()->route('admin.flowercategories.index');
    }
}
