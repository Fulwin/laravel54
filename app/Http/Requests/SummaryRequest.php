<?php

namespace App\Http\Requests;

class SummaryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
                {
                    return [
                        'title' => [
                            'required',
                            'min:10',
                            'max:80'
                        ],
                        'content' => [
                            'required'
                        ],
                        'next_week_mission' => [
                            'required'
                        ]
                    ];
                }
            // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        // UPDATE ROLES
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                };
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.min' => '标题过短',
            'title.max' => '标题过长',
            'content.required' => '总结内容不能为空',
            'next_week_mission.required' => '下周任务不能为空'
        ];
    }
}
