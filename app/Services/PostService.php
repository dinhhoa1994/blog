<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    /**
     * The post repository implementation.
     *
     * @var postRepository
     */
    protected $postRepository;

    /**
     * Instantiate a new PostService instance.
     *
     * @param $postRepository     PostRepository
     *
     * @return void
     */
    public function __construct(
        PostRepository $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    /**
     * Get's list of selected Categories columns by all
     *
     * @param $select array
     *
     * @return posts
     */
    public function all(array $select)
    {
        return $this->postRepository->all($select);
    }

    /**
     * Get's list post
     *
     * @param $request Request
     *
     * @return posts
     */
    public function list($request)
    {
        if ($request->has('keySearch')) {
            return $this->postRepository->search($request['keySearch']);
        }
        return $this->postRepository->list(['id', 'title', 'intro', 'content', 'image', 'tag', 'description', 'count_comment', 'slug', 'category_id', 'active']);
    }

    /**
     * Create a post.
     *
     * @param $request PostRequest
     *
     * @return void
     */
    public function store($request)
    {
        $this->postRepository->store($request);
    }

    /**
     * Get's post by it's id
     *
     * @param $id int
     *
     * @return post
     */
    public function findById(int $id)
    {
        return $this->postRepository->findById(['id', 'title', 'intro', 'content', 'image', 'tag', 'description', 'count_comment', 'slug', 'category_id', 'active'], $id);
    }

    /**
     * Update a post.
     *
     * @param $request PostRequest
     *
     * @return void
     */
    public function update($request, $id)
    {
        $this->postRepository->update($request, $request->id);
    }

    /**
     * Delete post by id.
     *
     * @param $id int
     *
     * @return void
     */
    public function delete(int $id)
    {
        $this->postRepository->delete($id);
    }
}
