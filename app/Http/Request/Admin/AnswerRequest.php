<?php

namespace App\Http\Request\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->user()->can('isAdmin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            'slug' => 'required|string|max:255|unique:answers',
            'title' => 'required|string|max:255',
            'feature' => 'required|integer',
            'status' => 'required|string|min:1|max:1'
        ];
    }
}
