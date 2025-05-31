<?php

namespace App\Services\Post;

use App\Http\Resources\Api\PostResource;
use App\Models\Post;
use App\Repositories\Post\Interfaces\PostInterface;

class PostService
{
    /**
     * Create a new PostService instance.
     */
    public function __construct(public PostInterface $postRepository)
    {
    }

    /**
     * Create a new post.
     *
     * @param array $data
     * @return Post
     */
    public function createPost(array $data): Post
    {
        $post = $this->postRepository->createPost($data);
        return $post;
    }
}