<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserRequest extends FormRequest
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
//        if ($this->avatar_remove){
//            $this->replace($this->except('avatar'));
//        }
        if ($this->password){
            $this->merge(['password' => Hash::make($this->password)]);
        } else {
            $this->replace($this->except('password'));
        }
        $this->merge(['updated_by' => auth()->id()]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array_merge(User::$editRules, ['phone_number' => User::$editRules['phone_number'].','.$this->route('user')]);
        return $rules;
    }
}
