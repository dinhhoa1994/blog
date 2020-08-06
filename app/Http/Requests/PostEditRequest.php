<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

	public function authorize() {
		return true;
	}

	/**
	 * Get validation rules for post that apply to the request.
	 *
	 * @return array
	 */

	public function rules() {
		return [
			'tag' => 'required',
			'description' => 'required',
			'slug' => 'required',
		];
	}

	/**
	 * Get the post confirmation error messages.
	 *
	 * @return array
	 */
	public function messages() {
		return [
			'name.tag' => config('post.tag_validation'),
			'name.description' => config('post.description_validation'),
			'name.slug' => config('post.slug_validation'),
		];
	}
}
