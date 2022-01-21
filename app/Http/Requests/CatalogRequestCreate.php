<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogRequestCreate extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pdf' => 'required|mimes:pdf|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'name_id.required' => 'The Indonesia Catalog Name field is required.',
            'name_en.required' => 'The English Catalog Name field is required.',
            'description_id.required' => 'The Indonesia Catalog Description field is required.',
            'description_en.required' => 'The English Catalog Description field is required.',
            'image.required' => 'The Image Catalog field is required.',
            'pdf.required' => 'The PDF File Catalog field is required.'
        ];
    }
}
