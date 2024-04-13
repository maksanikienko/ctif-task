<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EcoCode;

class EcoCodeController extends Controller
{
    public function index()
    {
        $ecoCodes = EcoCode::pluck('label','code');

        return response()->json($ecoCodes);

    }
}
