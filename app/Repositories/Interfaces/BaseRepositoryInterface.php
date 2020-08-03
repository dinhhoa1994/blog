<?php
namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * Get's list of selected Model columns by it's ID
     *
     * @param $select array
     * @param $id     int
     *
     * @return Model
     */
    public function findById(array $select, int $id);

    /**
     * Get's array selected of Model columns by columns
     *
     * @param $select     array
     * @param $conditions array
     *
     * @return Models
     */
    public function first(array $select, array $conditions);

    /**
     * Get's list of selected Model columns by conditions
     *
     * @param $select     array
     * @param $conditions array
     *
     * @return Models
     */
    public function find(array $select, array $conditions);

    /**
     * Get's list of selected Model columns by all
     *
     * @param $select array
     *
     * @return Models
     */
    public function all(array $select);

    /**
     * Delete a Model by id
     *
     * @param $id int
     *
     * @return void
     */
    public function delete(int $id);
}
