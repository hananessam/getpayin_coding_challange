<?php

namespace App\Services\Platform;

use App\Http\Resources\Api\PlatformResource;
use App\Models\Platform;
use App\Repositories\Platform\Interfaces\PlatformInterface;
use Illuminate\Support\Facades\Cache;

class PlatformService
{
    /**
     * Create a new PlatformService instance.
     */
    public function __construct(public PlatformInterface $platformRepository)
    {
    }

    /**
     * Get all platforms from the cache or database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPlatforms()
    {
        return Cache::remember('platforms', 60, function () {
            $platforms = $this->platformRepository->getAllPlatforms();
            return PlatformResource::collection($platforms);
        });
    }
}