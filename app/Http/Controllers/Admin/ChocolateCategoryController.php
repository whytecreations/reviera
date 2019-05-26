<?php

namespace App\Http\Controllers\Admin;

use App\ChocolateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChocolateCategoriesRequest;
use App\Http\Requests\Admin\UpdateChocolateCategoriesRequest;

class ChocolateCategoryController extends Controller
{

    /**
     * Display a listing of ChocolateCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('chocolate_category_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('chocolate_category_delete')) {
                return abort(401);
            }
            $chocolateCategories = ChocolateCategory::onlyTrashed()->get();
        } else {
            $chocolateCategories = ChocolateCategory::all();
        }

        return view('admin.chocolatecategories.index', compact('chocolateCategories'));
    }

    /**
     * Show the form for creating new ChocolateCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('chocolate_category_create')) {
            return abort(401);
        }
        return view('admin.chocolatecategories.create');
    }

    /**
     * Store a newly created ChocolateCategory in storage.
     *
     * @param  \App\Http\Requests\StoreChocolateCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChocolateCategoriesRequest $request)
    {
        if (! Gate::allows('chocolate_category_create')) {
            return abort(401);
        }
        $chocolateCategory = ChocolateCategory::create($request->all());


        return redirect()->route('admin.chocolatecategories.index');
    }


    /**
     * Show the form for editing ChocolateCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('chocolate_category_edit')) {
            return abort(401);
        }
        $chocolateCategory = ChocolateCategory::findOrFail($id);

        return view('admin.chocolatecategories.edit', compact('chocolateCategory'));
    }

    /**
     * Update ChocolateCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateChocolateCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChocolateCategoriesRequest $request, $id)
    {
        if (! Gate::allows('chocolate_category_edit')) {
            return abort(401);
        }
        
        $chocolateCategory = ChocolateCategory::findOrFail($id);
        $chocolateCategory->update($request->all());

        return redirect()->route('admin.chocolatecategories.index');
    }


    /**
     * Display ChocolateCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('chocolate_category_view')) {
            return abort(401);
        }
        $chocolateCategory = ChocolateCategory::findOrFail($id);

        return view('admin.chocolatecategories.show', compact('chocolateCategory'));
    }


    /**
     * Remove ChocolateCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('chocolate_category_delete')) {
            return abort(401);
        }
        $chocolateCategory = ChocolateCategory::findOrFail($id);
        $chocolateCategory->delete();

        return redirect()->route('admin.chocolatecategories.index');
    }

    /**
     * Delete all selected ChocolateCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('chocolate_category_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ChocolateCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore ChocolateCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('chocolate_category_delete')) {
            return abort(401);
        }
        $chocolateCategory = ChocolateCategory::onlyTrashed()->findOrFail($id);
        $chocolateCategory->restore();

        return redirect()->route('admin.chocolatecategories.index');
    }

    /**
     * Permanently delete ChocolateCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('chocolate_category_delete')) {
            return abort(401);
        }
        $chocolateCategory = ChocolateCategory::onlyTrashed()->findOrFail($id);
        $chocolateCategory->forceDelete();

        return redirect()->route('admin.chocolatecategories.index');
    }
}
