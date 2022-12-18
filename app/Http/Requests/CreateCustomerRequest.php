<?php

namespace App\Http\Requests;

use App\Models\Staff;
use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateCustomerRequest extends FormRequest
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
        $this->merge(['created_by' => auth()->id()]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = RuleFactory::make([
                'translations.%name%' => 'required|string',
                'translations.%company_name%' => 'required|string',
                'translations.%review%' => 'required|string',
            ]) + Staff::$createRules;
        return  $rules;
    }
}
