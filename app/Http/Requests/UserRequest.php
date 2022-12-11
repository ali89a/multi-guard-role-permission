<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string',
                    'email' => 'nullable|email|unique:users,email',
                   // 'password' => 'required|string|min:8|confirmed',
                 //   'phone' => "required|digits:11|regex:/(01)[0-9]{9}/|unique:users,phone",
                    'roles' => 'nullable|array'
                ];
                break;

            case 'PATCH':
            case 'PUT':
                return [
                    'id'=>'required|numeric',
                    'name' => 'required|string',
                    'email' => "nullable|email|unique:users,email,{$this->id}",
                    //'phone' => "required|digits:11|regex:/(01)[0-9]{9}/|unique:users,phone,{$this->id}",
                    'roles' => 'nullable|array',
                    'shift_id' => 'nullable',
                    'leave_policy_id' => 'nullable',
                   //'password' => 'nullable|string|min:8|confirmed',
                    'is_active'=>"required",Rule::in([0, 1]),
                ];
                break;
        }
    }
}
