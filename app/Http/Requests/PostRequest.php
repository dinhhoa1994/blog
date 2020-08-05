<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    // 'id', 'title', 'intro', 'content', 'image', 'tag', 'description', 'count_comment', 'slug', 'category_id', 'active'

    /**
     * Get validation rules for post that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required',
            'tag' => 'required',
            'description' => 'required',
            'image' => 'required',
            'slug' => 'required',
        ];
    }

    /**
     * Get the post confirmation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'  => config('post.name_validation'),
            'name.tag'  => config('post.tag_validation'),
            'name.description'  => config('post.description_validation'),
            'name.image'  => config('post.image_validation'),
            'name.slug'  => config('post.slug_validation'),
        ];
    }
}
