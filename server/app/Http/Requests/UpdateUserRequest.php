<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'role_id' => 'required',
            'password' => 'required|min:6|max:10',
            'email' => 'required|unique:users,email,'.$this->user()->id
//            'email' => 'required|email|unique:users,email,.$this->id,id'
//            'email' => ['required','email', Rule::unique('users','email')->ignore($this->user()->id)]
        ];
    }
}
