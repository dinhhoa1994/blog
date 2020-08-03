<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * The model implementation.
     *
     * @var model
     */
    protected $model;

    /**
     * Get's list of selected Model columns by it's ID
     *
     * @param $select array
     * @param $id     int
     *
     * @return Model
     */
    public function findById(array $select, int $id)
    {
        return $this->model->select($select)->findOrFail($id);
    }

    /**
     * Get's array selected of Model columns by columns
     *
     * @param $select     array
     * @param $conditions array
     *
     * @return Models
     */
    public function first(array $select, array $conditions)
    {
        return $this->model->select($select)->where($conditions)->first();
    }

    /**
     * Get's list of selected Model columns by columns
     *
     * @param $select     array
     * @param $conditions array
     *
     * @return Models
     */
    public function find(array $select, array $conditions)
    {
        return $this->model->select($select)->where($conditions)->get();
    }

    /**
     * Get's list of selected Model columns by all
     *
     * @param $select array
     *
     * @return Models
     */
    public function all(array $select)
    {
        return $this->model->select($select)->get();
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
        $this->model->find($id)->delete();
    }
}
