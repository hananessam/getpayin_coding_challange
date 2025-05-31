<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\Post\Interfaces\PostInterface;

class PostRepository implements PostInterface
{

    /**
     * Create a new PostRepository instance.
     */
    public function __construct(public Post $post)
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
        return $this->post->create($data);
    }
}