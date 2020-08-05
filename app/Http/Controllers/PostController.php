<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostEditRequest;

use Session;


class PostController extends Controller
{


    /**
     * The post Service implementation.
     *
     * @var postService
     */
    protected $postService;

    /**
     * Instantiate a new PostController instance.
     *
     * @param $postService PostService
     *
     * @return void
     */
    public function __construct(
        PostService $postService
    ) {
        $this->postService = $postService;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        try {
            $posts = $this->postService->list($request);
            return view('admin.posts.list', ['posts' => $posts]);
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            return view('admin.posts.create');
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $postRequest PostRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $postRequest)
    {
        //
        try {
            $this->postService->store($postRequest);
            return redirect(route('admin.post.index'));
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post = $this->postService->findById($id);
            if ($post['active'] === 0) {
                return back();
            } else {
                return view('admin.posts.show', ['post' => $post]);
            }
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        try {
            $post = $this->postService->findById($id);
            if ($post['active'] == 1) {
                return view('admin.posts.edit', ['post' => $post]);
            } else return redirect(route('admin.post.index'))->with('error', 'Post deleted ');
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PostEditRequest  $postRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $postRequest, $id)
    {
        //
        try {

            $this->postService->update($postRequest, $id);
            // Session::flash('successPost', config('post.success_update_post').$postRequest->name);
            return redirect(route('admin.post.index'));
        } catch (\Exception $e) {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        try {

            $this->postService->delete($id);
            // Session::flash('successPost', config('post.success_delete_post'));
            return redirect(route('admin.post.index'))->with('success', 'Post Deleted Successfully!');
        } catch (\Exception $e) {
            return back();
        }
    }
}
