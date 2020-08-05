<?php

namespace App\Repositories;

use App\Category;
use App\Post;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PostRepository extends BaseRepository
{
    /**
     * Instantiate a new PostRepository instance.
     *
     * @param $post Post
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    /**
     * Get's list post
     *
     * @param $select array
     *
     * @return posts
     */
    public function list($select)
    {
        return $this->model->select($select)->where('active', '=', '1')->paginate(3);
    }

    /**
     * Search key search in list post.
     *
     * @param $keySearch string
     *
     * @return posts
     */
    public function search($keySearch)
    {
        $select = ['id', 'title', 'intro', 'content', 'image', 'tag', 'description', 'count_comment', 'slug', 'category_id', 'active'];
        return $this->model->select($select)
            ->where('name', 'like', '%' . $keySearch . '%')
            ->orwhere('description', 'like', '%' . $keySearch . '%')
            ->paginate(Config('post.paginate'));
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
        $data = array();
        $data['title'] = $request->title;
        $data['intro'] = $request->intro;
        $data['content'] = $request->content;
        $data['count_comment'] = $request->count_comment;
        $data['category_id'] = $request->category_id;
        $data['tag'] = $request->tag;
        $data['description'] = $request->description;
        $data['slug'] = $request->slug;

        $img_file = $request->file('image');
        if ($img_file) {

            $img_file_extension = $img_file->getClientOriginalExtension();

            if ($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg') {
                return redirect('admin/post/create')->with('error', 'Only support file : png, jpg, jpeg!');
            }

            $img_file_name = $img_file->getClientOriginalName();
            $upload_patch = 'public/media/';

            $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            while (file_exists('public/media/' . $random_file_name)) {
                $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            }

            $successUpload = $img_file->move($upload_patch, $random_file_name);
            $data['image'] = $random_file_name;
        } else
            $data['image'] = '';

        $data['active'] = 1;
        $posts = DB::table('posts')->insert($data);
        $request->session()->flash('success', 'Post Created Successfully!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Update a post.
     *
     * @param $columns array
     * @param $id      int
     *
     * @return void
     */
    public function update($request, $id)
    {

        $post = DB::table('posts')->where('id', $id);
        $data = array();
        $data['title'] = $request->title;
        $data['intro'] = $request->intro;
        $data['content'] = $request->content;
        $data['count_comment'] = $request->count_comment;
        $data['category_id'] = $request->category_id;
        $data['tag'] = $request->tag;
        $data['description'] = $request->description;
        $data['slug'] = $request->slug;


        // $old_file_name = $request['image'];

        if ($request->hasFile('image')) {
            $img_file = $request->file('image');
            $img_file_extension = $img_file->getClientOriginalExtension();

            if ($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg') {
                return redirect('admin/post/create')->with('error', 'Only support file : png, jpg, jpeg!');
            }

            $img_file_name = $img_file->getClientOriginalName();
            $upload_patch = 'public/media/';

            $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            while (file_exists('public/media/' . $random_file_name)) {
                $random_file_name = $upload_patch . date('dmy_H_s_i') . '_' . $img_file_name;
            }

            $successUpload = $img_file->move($upload_patch, $random_file_name);
            $data['image'] = $random_file_name;
        }
        //  else {
        //     $data['image'] = $old_file_name;
        // }


        $data['active'] = 1;

        $post->update($data);

        $request->session()->flash('success', 'Post Updated Successfully!');
        return redirect()->route('admin.post.index');
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
        $post = $this->model->find($id);
        $post->active = 0;
        $post->save();
    }
}
