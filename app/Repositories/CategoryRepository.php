<?php

namespace App\Repositories;

// use App\Category;
use App\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    /**
     * Instantiate a new CategoryRepository instance.
     *
     * @param $category Category
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    /**
     * Get's list category
     *
     * @param $select array
     *
     * @return categories
     */
    public function list($select)
    {
        return $this->model->select($select)->paginate(Config('category.paginate'));
    }

    /**
     * Search key search in list category.
     *
     * @param $keySearch string
     *
     * @return categories
     */
    public function search($keySearch)
    {
        $select = ['id', 'name', 'description'];
        return $this->model->select($select)
            ->where('name', 'like', '%' . $keySearch . '%')
            ->orwhere('description', 'like', '%' . $keySearch . '%')
            ->paginate(Config('category.paginate'));
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
        $this->model->create(['name' => $request->name, 'description' => $request->description]);
    }

    /**
     * Update a category.
     *
     * @param $columns array
     * @param $id      int
     *
     * @return void
     */
    public function update($columns, $id)
    {
        $this->model->find($id)->update($columns);
    }

    /**
     * Get list image by id category.
     *
     * @param $id int
     *
     * @return productImages
     */
    public function imageByCategory($id)
    {
        return $this->model->select('product_images.image')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('product_images', 'product_id', '=', 'products.id')
            ->where('categories.id', $id)->get();
    }

    /**
     * Delete a Model by id
     *
     * @param $id int
     *
     * @return void
     */
    public function delete(int $id)
    {
        $category = $this->model->find($id);
        if ($category->products->isEmpty()) {
            $category->delete();
        }
    }
}
