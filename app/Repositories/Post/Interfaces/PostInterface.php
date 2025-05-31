<?php

namespace App\Repositories\Post\Interfaces;

use App\Models\Post;

interface PostInterface
{
    public function createPost(array $data): Post;
}
