<?php

namespace Corp\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Corp\Article;
class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo('ADD_ARTICLE');
    }

   protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->sometimes('alias','unique:articles|max:255', function($input) {
            if($this->route()->hasParameter('article')) {
                $model = $this->route()->parameter('article');
                return ($model->alias !== $input->alias)  && !empty($input->alias);
            }

            return !empty($input->alias);

        });

        return $validator;


    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|max:255',
            'text' => 'required',
            'categoryId' => 'required|integer',
            'alias' => 'required|max:255',
            'keywords' => 'required',
            'meta_desc' => 'required',

        ];
    }
}
