<?php

namespace App\Repositories\Platform;

use App\Models\Platform;
use App\Repositories\Platform\Interfaces\PlatformInterface;
use Illuminate\Database\Eloquent\Collection;

class PlatformRepository implements PlatformInterface
{

    /**
     * Create a new PlatformRepository instance.
     */
    public function __construct(public Platform $platform)
    {
    }

    public function getAllPlatforms(): Collection   
    {
        return $this->platform->all();
    }
}