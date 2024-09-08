<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class VersionController extends Controller
{
    /**
     * Handle the version request.
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return response()->json(['version' => '1.0.0']);
    }
}
