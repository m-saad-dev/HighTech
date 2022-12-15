<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserRequest extends FormRequest
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
        if ($this->password){
            $this->merge(['password' => Hash::make($this->password)]);
        } else {
            $this->replace($this->except('password'));
        }
        $this->merge(['created_by' => auth()->id()]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return User::$createRules;
    }
}
