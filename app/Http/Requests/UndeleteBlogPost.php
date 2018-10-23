<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UndeleteBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole("admin");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'deleted_at' => '' // again, this need a custom validation rule, since the value can be null
        ];
    }
}
