<?php

namespace App\Http\Requests;

use App\Models\Service;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UpdateServiceRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge(['updated_by' => auth()->id()]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = RuleFactory::make([
                'translations.%title%' => 'required|string|max:255',
                'translations.%sub_title%' => 'required|string|max:255',
                'translations.%description%' => 'required|string|min:3|max:18780',
            ]) + Service::$editRules;
        return $rules;
    }
}
