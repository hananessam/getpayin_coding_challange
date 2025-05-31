<?php

namespace App\Http\Controllers\Api\Post;

use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct(public PostService $postService)
    {
    }

    /**
     * Create a new post.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPost(PostRequest $request)
    {
        $validatedData = $request->validated();

        $post = $this->postService->createPost([
            ...$validatedData,
            'user_id' => $request->user()->id,
            'status' => $this->getPostStatus($request),
        ]);

        return response()->json([
            'post' => $post
        ], 201);
    }

    /**
     * Determine the post status based on the request.
     *
     * @param Request|PostRequest $request
     * @return PostStatus
     */
    private function getPostStatus(Request|PostRequest $request): PostStatus
    {
        return match (true) {
            $request->boolean('is_draft') => PostStatus::DRAFT,
            $request->filled('scheduled_time') => PostStatus::SCHEDULED,
            default => PostStatus::PUBLISHED,
        };
    }
}