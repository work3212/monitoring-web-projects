<?php

namespace App\Http\Controllers\Projects\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class ProjectStoreRequest extends FormRequest
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
            'name' => 'required',
            'keyword' => 'required'
        ];
    }

    public function getFormData()
    {
        $data = $this->request->all();
        $data = Arr::except($data, [
            '_token',
        ]);
        return $data;
    }

    public function messages()
    {
        return [
            'name.required' => "Заполните название проекта",
            'keyword.required' => "Заполните ключевое слово",
        ];
    }


}
