<?php

namespace Corp\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class PortfolioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('EDIT_PORTFOLIO');
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'title' => 'required|max:255',
            'text' => 'required',
            'alias' => 'required|max:255',
            'keywords' => 'required',
            'meta_desc' => 'required',

        ];
    }
}
