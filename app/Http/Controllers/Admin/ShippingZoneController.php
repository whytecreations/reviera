<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreChocolateCategoriesRequest;
use App\Http\Requests\Admin\UpdateChocolateCategoriesRequest;
use App\ShippingZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShippingZoneController extends Controller
{

    /**
     * Display a listing of ShippingZone.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('shipping_zone_access')) {
            return abort(401);
        }

        if (request('show_deleted') == 1) {
            if (!Gate::allows('shipping_zone_delete')) {
                return abort(401);
            }
            $shippingZones = ShippingZone::onlyTrashed()->get();
        } else {
            $shippingZones = ShippingZone::all();
        }

        return view('admin.shippingzones.index', compact('shippingZones'));
    }

    /**
     * Show the form for creating new ShippingZone.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('shipping_zone_create')) {
            return abort(401);
        }
        return view('admin.shippingzones.create');
    }

    /**
     * Store a newly created ShippingZone in storage.
     *
     * @param  \App\Http\Requests\StoreChocolateCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChocolateCategoriesRequest $request)
    {
        if (!Gate::allows('shipping_zone_create')) {
            return abort(401);
        }
        $request['slug'] = str_slug($request->name);
        $shippingZone = ShippingZone::create($request->all());

        return redirect()->route('admin.shippingzones.index');
    }

    /**
     * Show the form for editing ShippingZone.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('shipping_zone_edit')) {
            return abort(401);
        }
        $shippingZone = ShippingZone::findOrFail($id);

        return view('admin.shippingzones.edit', compact('shippingZone'));
    }

    /**
     * Update ShippingZone in storage.
     *
     * @param  \App\Http\Requests\UpdateChocolateCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChocolateCategoriesRequest $request, $id)
    {
        if (!Gate::allows('shipping_zone_edit')) {
            return abort(401);
        }

        $shippingZone = ShippingZone::findOrFail($id);
        $request['slug'] = str_slug($request->name);
        $shippingZone->update($request->all());

        return redirect()->route('admin.shippingzones.index');
    }

    /**
     * Display ShippingZone.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('shipping_zone_view')) {
            return abort(401);
        }
        $shippingZone = ShippingZone::findOrFail($id);

        return view('admin.shippingzones.show', compact('shippingZone'));
    }

    /**
     * Remove ShippingZone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('shipping_zone_delete')) {
            return abort(401);
        }
        $shippingZone = ShippingZone::findOrFail($id);
        $shippingZone->delete();

        return redirect()->route('admin.shippingzones.index');
    }

    /**
     * Delete all selected ShippingZone at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('shipping_zone_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ShippingZone::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                // $entry->deletePreservingMedia();
                $shippingZone->delete();
            }
        }
    }

    /**
     * Restore ShippingZone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('shipping_zone_delete')) {
            return abort(401);
        }
        $shippingZone = ShippingZone::onlyTrashed()->findOrFail($id);
        $shippingZone->restore();

        return redirect()->route('admin.shippingzones.index');
    }

    /**
     * Permanently delete ShippingZone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('shipping_zone_delete')) {
            return abort(401);
        }
        $shippingZone = ShippingZone::onlyTrashed()->findOrFail($id);
        $shippingZone->forceDelete();

        return redirect()->route('admin.shippingzones.index');
    }
}
