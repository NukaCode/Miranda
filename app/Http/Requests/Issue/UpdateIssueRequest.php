<?php

namespace App\Http\Requests\Issue;

use App\Http\Requests\Request;

class UpdateIssueRequest extends Request
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
            'name'      => 'required',
            'parent_id' => 'exists:issues,id',
        ];
    }
}
