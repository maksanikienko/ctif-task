<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LocalCode;
use Illuminate\Http\Request;

class LocalCodeController extends Controller
{
    public function index()
    {
        $localCodes = LocalCode::where('parent_cdc','')->pluck('name', 'cdc');

        return response()->json($localCodes);
    }
    public function getChildLocation(Request $request)
    {
        $selected_cdc = $request->input('selected_cdc');
        $childCodes = LocalCode::where('parent_cdc', $selected_cdc)->pluck('name', 'cdc');

        return response()->json($childCodes);
    }
}
