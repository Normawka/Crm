<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $rules =[
            'name'=>'min:1|max:255',
            'description'=>'min:1|max:255',

        ];
        return $rules;
    }
    public function messages()
    {
        return[
            'required' => 'Field :attribute is required' ,
            'min' => 'Field :attribute  must have at least :min characters',
            'max' => 'Field :attribute must have a maximum of :max characters',
            'numeric' => 'Field :attribute field must only contain numbers',
            'unique' => 'Such :attribute exists enter other data',

        ];

        //  return parent::messages(); // TODO: Change the autogenerated stub
    }
}