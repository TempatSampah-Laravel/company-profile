<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigWebRequest extends FormRequest
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
            'nameweb' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keywords' => 'required',
            'description' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'whatsapp' => 'required',
            'address' => 'required',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'twitter' => 'required|url',
            'linkedin' => 'required|url',
            'google_maps' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nameweb.required' => 'The Company Name field is required.',
            'keywords.required' => 'The Keywords field is required.',
            'description.required' => 'The Description field is required.',
            'email.required' => 'The Email field is required.',
            'phone.required' => 'The Phone Number field is required.',
            'whatsapp.required' => 'The Whatsapp Number field is required.',
            'address.required' => 'The Address field is required.',
            'facebook.required' => 'The Facebook field is required.',
            'instagram.required' => 'The Instagram field is required.',
            'twitter.required' => 'The Twitter field is required.',
            'linkedin.required' => 'The Twitter field is required.',
            'google_maps.required' => 'The Google Maps field is required.',
        ];
    }
}
