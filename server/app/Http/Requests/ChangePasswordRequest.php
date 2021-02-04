<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
        $user = User::find(Auth::user()->id);
        return [
            'password' => 'required|min:6',
            'current_password' => ['required', function($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('your current password is invalid'));
                }
            }],
            'passwordConfirm' => 'required|same:password'
            ];
    }

    public function message()
    {
        return [
            'password.required' => 'Password can not be null',
            'password.min' => 'Password must be greater than 6 characters',
            'passwordConfirm.required' => 'Password can not be null',
            'passwordConfirm.same' => 'Password not match',
            'current_password.required' => 'Your current password can not be null'
        ];
    }
}
