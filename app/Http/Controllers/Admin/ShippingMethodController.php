<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\Admin\StoreShippingMethodsRequest;
use App\Http\Requests\Admin\UpdateShippingMethodsRequest;
use App\ShippingMethod;
use App\ShippingZone;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShippingMethodController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of ShippingMethod.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('shipping_method_access')) {
            return abort(401);
        }
        if (request('show_deleted') == 1) {
            if (!Gate::allows('shipping_method_delete')) {
                return abort(401);
            }
            $shippingMethods = ShippingMethod::onlyTrashed()->get();
        } else {
            $shippingMethods = ShippingMethod::all();
        }

        return view('admin.shippingmethods.index', compact('shippingMethods'));
    }

    /**
     * Show the form for creating new ShippingMethod.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('shipping_method_create')) {
            return abort(401);
        }
        $zones = ShippingZone::all();
        return view('admin.shippingmethods.create', compact('zones'));
    }

    /**
     * Store a newly created ShippingMethod in storage.
     *
     * @param  \App\Http\Requests\StoreShippingMethodsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShippingMethodsRequest $request)
    {
        if (!Gate::allows('shipping_method_create')) {
            return abort(401);
        }
        $ShippingMethod = ShippingMethod::create($request->all());

        foreach ($request->zones as $zoneId => $charge) {
            $ShippingMethod->zones()->attach($zoneId, ['shipping_charge' => $charge]);
        }
        return redirect()->route('admin.shippingmethods.index');
    }

    /**
     * Show the form for editing ShippingMethod.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('shipping_method_edit')) {
            return abort(401);
        }
        $shippingMethod = ShippingMethod::findOrFail($id);
        $zones = ShippingZone::all();
        return view('admin.shippingmethods.edit', compact('shippingMethod', 'zones'));
    }

    /**
     * Update ShippingMethod in storage.
     *
     * @param  \App\Http\Requests\UpdateShippingMethodsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippingMethodsRequest $request, $id)
    {
        if (!Gate::allows('shipping_method_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $ShippingMethod = ShippingMethod::findOrFail($id);
        $ShippingMethod->update($request->all());

        $ShippingMethod->zones()->detach();
        foreach ($request->zones as $zoneId => $charge) {
            $ShippingMethod->zones()->attach($zoneId, ['shipping_charge' => $charge]);
        }

        return redirect()->route('admin.shippingmethods.index');
    }

    /**
     * Display ShippingMethod.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Gate::allows('shipping_method_view')) {
            return abort(401);
        }
        $shippingMethod = ShippingMethod::findOrFail($id);

        return view('admin.shippingmethods.show', compact('shippingMethod'));
    }

    /**
     * Remove ShippingMethod from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('shipping_method_delete')) {
            return abort(401);
        }
        $ShippingMethod = ShippingMethod::findOrFail($id);
        // $ShippingMethod->deletePreservingMedia();
        $ShippingMethod->delete();

        return redirect()->route('admin.shippingmethods.index');
    }

    /**
     * Delete all selected ShippingMethod at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('shipping_method_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ShippingMethod::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    /**
     * Restore ShippingMethod from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (!Gate::allows('shipping_method_delete')) {
            return abort(401);
        }
        $ShippingMethod = ShippingMethod::onlyTrashed()->findOrFail($id);
        $ShippingMethod->restore();

        return redirect()->route('admin.shippingmethods.index');
    }

    /**
     * Permanently delete ShippingMethod from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (!Gate::allows('shipping_method_delete')) {
            return abort(401);
        }
        $ShippingMethod = ShippingMethod::onlyTrashed()->findOrFail($id);
        $ShippingMethod->forceDelete();

        return redirect()->route('admin.shippingmethods.index');
    }

    public function getShippingCost(ShippingMethod $method, ShippingZone $zone)
    {

        $cost = $method->zones()->find($zone->id)->pivot->shipping_charge;
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'shipping charge',
            'type' => $method->name,
            'target' => 'total',
            'value' => $cost,
            'attributes' => array(
                'shipping_method_id' => $method->id,
                'shipping_zone_id' => $zone->id,
            ),
        ));
        Cart::condition($condition);
        return response()->json(['shippingCharge' => $cost, 'subTotal' => Cart::getSubTotal(), 'total' => Cart::getTotal()]);
    }
}
