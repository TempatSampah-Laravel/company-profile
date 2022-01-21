<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_id' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_id' => 'required',
            'description_en' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name_id.required' => 'The Indonesia Product Name field is required.',
            'name_en.required' => 'The English Product Name field is required.',
            'description_id.required' => 'The Indonesia Product Description field is required.',
            'description_en.required' => 'The English Product Description field is required.',
            'category_id.required' => 'The Category Product field is required.'
        ];
    }
}
