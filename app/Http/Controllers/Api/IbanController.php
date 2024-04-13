<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Iban;
use Illuminate\Http\Request;

class IbanController extends Controller
{
    public function index(Request $request)
    {
        $ecoCode = $request->input('eco_code');
        $locationCode = $request->input('local_code');
        $iban = Iban::where('eco_code', $ecoCode)
                ->where('location_code', $locationCode)
                ->first();

            if ($iban) {
                return response()->json($iban);
            } else {
                return response()->json(['error' => 'IBAN not found for given codes'], 404);
            }
        }
}
