<?php

namespace App\Repositories;

use App\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;


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
        return $this->model->select($select)->where('active', '=', '1')->paginate(3);
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
        $select = ['id', 'name', 'tag', 'description', 'icon', 'slug'];
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
        $data = array();
        $data['name'] = $request->name;
        $data['tag'] = $request->tag;
        $data['description'] = $request->description;
        $data['slug'] = $request->slug;

        $img_file = $request->file('icon');
        if ($img_file) {

            $img_file_extension = $img_file->getClientOriginalExtension();

            if ($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg') {
                return redirect('admin/category/create')->with('error', 'Only support file : png, jpg, jpeg!');
            }

            $img_file_name = $img_file->getClientOriginalName();
            $upload_patch = 'public/media/';

            $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            while (file_exists('public/media/' . $random_file_name)) {
                $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            }

            $successUpload = $img_file->move($upload_patch, $random_file_name);
            $data['icon'] = $random_file_name;
        } else
            $data['icon'] = '';

        $data['active'] = 1;
        $categories = DB::table('categories')->insert($data);
        $request->session()->flash('success', 'Category Created Successfully!');
        return redirect()->route('admin.category.index');
    }

    /**
     * Update a category.
     *
     * @param $columns array
     * @param $id      int
     *
     * @return void
     */
    public function update($request, $id)
    {


        $data = array();
        $data['name'] = $request->name;
        $data['tag'] = $request->tag;
        $data['description'] = $request->description;
        $data['slug'] = $request->slug;

        $img_file = $request->file('icon');
        if ($img_file) {

            $img_file_extension = $img_file->getClientOriginalExtension();

            if ($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg') {
                return redirect('admin/category/create')->with('error', 'Only support file : png, jpg, jpeg!');
            }

            $img_file_name = $img_file->getClientOriginalName();
            $upload_patch = 'public/media/';

            $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            while (file_exists('public/media/' . $random_file_name)) {
                $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            }

            $successUpload = $img_file->move($upload_patch, $random_file_name);
            $data['icon'] = $random_file_name;
        } else
            $data['icon'] = $request->icon;

        $data['active'] = 1;

        $category = DB::table('categories')->where('id', $id)->update($data);

        $request->session()->flash('success', 'Category Updated Successfully!');
        return redirect()->route('admin.category.index');
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
        $category->delete();
    }
}
