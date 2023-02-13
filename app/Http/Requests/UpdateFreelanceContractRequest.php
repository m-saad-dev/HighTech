<?php

namespace App\Http\Requests;

use App\Models\Client;
use App\Models\FreelanceContract;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateFreelanceContractRequest extends FormRequest
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
        $staff = FreelanceContract::$editRules;
        return $staff;
    }
    
    public function messages()
    {
        return [
                'freelancers.*.freelancer_id.required' => 'This field is required.',
                'freelancers.*.fees.required' => 'This field is required.',
                'freelancers.*.fees.required' => 'This field is numeric.'
        ];
    }
}
