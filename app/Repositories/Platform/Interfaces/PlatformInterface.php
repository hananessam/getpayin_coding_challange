<?php

namespace App\Repositories\Platform\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface PlatformInterface
{
    public function getAllPlatforms(): Collection;
}
