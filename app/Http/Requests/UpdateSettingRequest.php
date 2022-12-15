<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() ? true : false;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->route()->parameter('key') == 'about_us') {
                $this->replace(['key' => 'about_us', 'value' => json_encode($this->about_us, true)]);
            }
        });
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|required|max:255',
            'content' => 'sometimes|required',
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,svg,avi,mp4,mov,ogg',
            'document' => 'sometimes|required|mimes:pdf',
            'logo.title' => 'sometimes|required|max:255',
            'fav_icon.title' => 'sometimes|required|max:255',
            'app_links.*.title' => 'sometimes|required|max:255',
            'app_links.*.link' => 'sometimes|required|max:255',
            'contact_us.*.country' => 'sometimes|required|max:255',
            'contact_us.*.address' => 'sometimes|required|max:255',
            'contact_us.*.emails.*' => 'sometimes|required|max:70',
            'contact_us.*.phones.*' => 'sometimes|required|max:16',
        ];
    }
}
