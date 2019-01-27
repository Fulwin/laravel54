<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
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
        return [
            'account' => [
                'filled',
                'min:2',
                'max:20',
                'regex:/^[A-Za-z]+$/',
                Rule::unique('users')->ignore(Auth::id())
            ],
            'name' => 'required|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::id())
            ],
            'department_id' => [
                'filled'
            ],
            'level_id' => [
                'filled'
            ],
            'post_id' => [
                'required',
                'array',
                'min:1'
            ],
            'report_id' => [
                'filled'
            ]
        ];
    }

    public function messages()
    {
        return [
            'account.filled' => '账号不能为空',
            'account.min' => '账号不能小于2位字符',
            'account.max' => '账号不能大于20位字符',
            'account.regex' => '账号格式错误',
            'account.unique' => '账号已存在',
            'name.required' => '姓名不能为空',
            'name.max' => '姓名不能超过20个字符',
            'email.required' => '邮箱不能为空',
            'email.email' => '邮箱格式错误',
            'email.unique' => '邮箱已存在',
            'department_id.filled' => '部门不能为空',
            'level_id.filled' => '级别不能为空',
            'post_id.required' => '职位不能为空',
            'post_id.min' => '职位不能为空',
            'report_id.filled' => '汇报关系不能为空'
        ];
    }
}
