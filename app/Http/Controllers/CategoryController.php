<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * The category Service implementation.
	 *
	 * @var categoryService
	 */
	protected $categoryService;

	/**
	 * Instantiate a new CategoryController instance.
	 *
	 * @param $categoryService CategoryService
	 *
	 * @return void
	 */
	public function __construct(
		CategoryService $categoryService
	) {
		$this->categoryService = $categoryService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {

		try {
			$categories = $this->categoryService->list($request);
			return view('admin.categories.list', ['categories' => $categories]);
		} catch (\Exception $e) {
			return back();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		try {
			return view('admin.categories.create');
		} catch (\Exception $e) {
			return back();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param $categoryRequest CategoryRequest
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $categoryRequest) {
		//
		try {
			$this->categoryService->store($categoryRequest);
			return redirect(route('admin.category.index'));
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
	public function show($id) {
		try {
			$category = $this->categoryService->findById($id);
			if ($category['active'] === 0) {
				return back();
			} else {
				return view('admin.categories.show', ['category' => $category]);
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
	public function edit($id) {

		try {
			$category = $this->categoryService->findById($id);
			if ($category['active'] == 1) {
				return view('admin.categories.edit', ['category' => $category]);
			} else {
				return redirect(route('admin.category.index'))->with('error', 'Category deleted ');
			}

		} catch (\Exception $e) {
			return back();
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Http\Requests\CategoryEditRequest  $categoryRequest
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(CategoryEditRequest $categoryRequest, $id) {
		//
		try {

			$this->categoryService->update($categoryRequest, $id);
			// Session::flash('successCategory', config('category.success_update_category').$categoryRequest->name);
			return redirect(route('admin.category.index'));
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
	public function destroy($id) {
		//

		try {

			$this->categoryService->delete($id);
			// Session::flash('successCategory', config('category.success_delete_category'));
			return redirect(route('admin.category.index'))->with('success', 'Category Deleted Successfully!');
		} catch (\Exception $e) {
			return back();
		}
	}
}
