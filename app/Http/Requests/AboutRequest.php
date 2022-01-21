<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'content_id' => 'required',
            'content_en' => 'required',
            'vision_id' => 'required',
            'vision_en' => 'required',
            'mission_id' => 'required',
            'mission_en' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title_id.required' => 'The indonesia title field is required.',
            'title_en.required' => 'The english title field is required.',
            'content_id.required' => 'The indonesia content field is required.',
            'content_en.required' => 'The english content field is required.',
            'vision_id.required' => 'The indonesia vision field is required.',
            'vision_en.required' => 'The english vision field is required.',
            'mission_id.required' => 'The indonesia mission field is required.',
            'mission_en.required' => 'The english mission field is required.',
        ];
    }
}
