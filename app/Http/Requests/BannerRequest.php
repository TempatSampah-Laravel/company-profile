<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_id' => 'required',
            'description_en' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:4096',
        ];
    }

    public function messages()
    {
        return [
            'title_id.required' => 'The indonesia title field is required.',
            'title_en.required' => 'The english title field is required.',
            'description_id.required' => 'The indonesia description field is required.',
            'description_en.required' => 'The english description field is required.',
        ];
    }
}
