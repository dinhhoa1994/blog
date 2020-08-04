<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * The category repository implementation.
     *
     * @var categoryRepository
     */
    protected $categoryRepository;

    /**
     * Instantiate a new CategoryService instance.
     *
     * @param $categoryRepository     CategoryRepository
     *
     * @return void
     */
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get's list of selected Categories columns by all
     *
     * @param $select array
     *
     * @return categories
     */
    public function all(array $select)
    {
        return $this->categoryRepository->all($select);
    }

    /**
     * Get's list category
     *
     * @param $request Request
     *
     * @return categories
     */
    public function list($request)
    {
        if ($request->has('keySearch')) {
            return $this->categoryRepository->search($request['keySearch']);
        }
        return $this->categoryRepository->list(['id', 'name', 'tag', 'description', 'icon', 'slug']);
    }

    /**
     * Create a category.
     *
     * @param $request CategoryRequest
     *
     * @return void
     */
    public function store($request)
    {
        $this->categoryRepository->store($request);
    }

    /**
     * Get's category by it's id
     *
     * @param $id int
     *
     * @return category
     */
    public function findById(int $id)
    {
        return $this->categoryRepository->findById(['id', 'name', 'tag', 'description', 'icon', 'slug'], $id);
    }

    /**
     * Update a category.
     *
     * @param $request CategoryRequest
     *
     * @return void
     */
    public function update($request)
    {
        $this->categoryRepository->update($request->only(['name', 'tag', 'description', 'icon', 'slug']), $request->id);
    }

    /**
     * Delete category by id.
     *
     * @param $id int
     *
     * @return void
     */
    public function delete(int $id)
    {
        $this->categoryRepository->delete($id);
    }
}
