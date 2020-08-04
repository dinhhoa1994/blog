<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryEditRequest extends FormRequest
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

    /**
     * Get validation rules for category that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'tag' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ];
    }

    /**
     * Get the category confirmation error messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'  => config('category.name_validation'),
            'name.tag'  => config('category.tag_validation'),
            'name.description'  => config('category.description_validation'),
            'name.slug'  => config('category.slug_validation'),
        ];
    }
}
