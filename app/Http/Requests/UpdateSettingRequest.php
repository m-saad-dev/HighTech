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
                $this->replace(['key' => 'about_us', 'value' => json_encode($this->about_us)]);
            } elseif ($this->route()->parameter('key') == 'logo'){
                $this->replace(['key' => 'logo', 'value' => json_encode($this->logo)]);
            } elseif ($this->route()->parameter('key') == 'links'){
                $this->replace(['key' => 'links', 'value' => json_encode($this->links)]);
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
            'image' => 'sometimes|required|mimes:jpg,jpeg,png,svg,avi,mp4,mov,ogg',
            'document' => 'sometimes|required|mimes:pdf',
            'about_us.title.ar' => 'sometimes|required|max:255',
            'about_us.title.en' => 'sometimes|required|max:255',
            'about_us.content.ar' => 'sometimes|required',
            'about_us.content.en' => 'sometimes|required',
            'logo.title' => 'sometimes|required|max:255',
            'fav_icon.title' => 'sometimes|required|max:255',
            'links.*.title.ar' => 'sometimes|required|max:255',
            'links.*.title.en' => 'sometimes|required|max:255',
            'links.*.link' => 'sometimes|required|max:255',
            'contact_us.*.country' => 'sometimes|required|max:255',
            'contact_us.*.address' => 'sometimes|required|max:255',
            'contact_us.*.emails.*' => 'sometimes|required|max:70',
            'contact_us.*.phones.*' => 'sometimes|required|max:16',
        ];
    }
}
