<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        $rules= [
            'category_name' => ['required', 'string', 'max:100', 'min:2', 'unique:categories,name'],
            'status' => ['required', 'in:0,1'],
        ];

        if(request()->update_id){
            $rules['category_name'][4] = 'unique:categories,name,'.request()->update_id;
        }

        return $rules;


    }
}
