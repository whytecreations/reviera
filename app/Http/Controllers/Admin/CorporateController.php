<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Corporate;

class CorporateController extends Controller
{
    public function index()
    {
        if (! Gate::allows('corporate_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('corporate_delete')) {
                return abort(401);
            }
            $corporates = Corporate::onlyTrashed()->get();
        } else {
            $corporates = Corporate::all();
        }

        return view('admin.corporates.index', compact('corporates'));
    }

    public function show($id)
    {
        if (! Gate::allows('corporate_view')) {
            return abort(401);
        }
        $corporate = Corporate::findOrFail($id);

        return view('admin.corporates.show', compact('corporate'));
    }
}