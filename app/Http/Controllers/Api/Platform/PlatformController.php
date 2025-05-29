<?php

namespace App\Http\Controllers\Api\Platform;

use App\Http\Controllers\Controller;
use App\Services\Platform\PlatformService;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    /**
     * Create a new PlatformController instance.
     */
    public function __construct(public PlatformService $platformService)
    {
    }

    public function platforms(Request $request)
    {
        return response()->json([
            'data' => $this->platformService->getAllPlatforms(),
        ]);
    }
}
